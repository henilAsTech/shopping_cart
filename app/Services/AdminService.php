<?php

namespace App\Services;

use App\Models\Admin;

class AdminService
{
    public function create(array $data): Admin
    {
        $admin = Admin::create($data);
        return $admin;
    }
    
    public function update(Admin $admin, array $data): Admin
    {
        $admin->update($data);
        return $admin;
    }
}