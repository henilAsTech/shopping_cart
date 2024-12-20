<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::query();

            return DataTables::of($data)
                    ->addIndexColumn()
                    ->make(true);
        }
          
        return view('super_admin.user.list');
    }
}
