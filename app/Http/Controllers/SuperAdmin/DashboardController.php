<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $adminCount = Admin::count();
        $userCount = User::count();
        return view('super_admin.dashboard.index', compact('adminCount', 'userCount'));
    }
}
