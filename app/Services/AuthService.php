<?php
namespace App\Services;

use App\Models\Admin;
use App\Models\SuperAdmin;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    protected $role;

    public function setRole(int $id): array
    {
        return $this->role = $this->getRoleData($id);
    }

    function getRoleData(int $role_id): array | bool
    {
        switch ($role_id) {
            case 0:
                return [
                    'id' => 0,
                    'name' => 'User',
                    'guard' => 'user',
                    'broker' => 'users',
                    'model' => User::class,
                    'dashboard' => 'user.dashboard',
                ];
            case 1:
                return [
                    'id' => 1,
                    'name' => 'Admin',
                    'guard' => 'admin',
                    'broker' => 'admins',
                    'model' => Admin::class,
                    'dashboard' => 'admin.dashboard',
                ];
            case 2:
                return [
                    'id' => 2,
                    'name' => 'Super Admin',
                    'guard' => 'super_admin',
                    'broker' => 'super_admins',
                    'model' => SuperAdmin::class,
                    'dashboard' => 'superadmin.dashboard',
                ];
            default:
                return false;
        }
    }

    public function register(array $data)
    {
        $user = $this->getRoleData($data['role']);
        $user['model']::create($data);

        if (Auth::guard($user['guard'])->attempt([
            'email' => $data['email'], 
            'password' => $data['password']
        ])) {
            request()->session()->regenerate();
            session(['auth_guard' => $user['guard']]);
        }
        return $user['dashboard'];
    }

    public function logout()
    {
        auth()->guard($this->role['guard'])->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('login');
    }
}
