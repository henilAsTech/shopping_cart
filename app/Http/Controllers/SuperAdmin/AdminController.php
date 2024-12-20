<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Requests\SuperAdmin\AdminRequest;
use App\Services\AdminService;

class AdminController extends Controller
{
    public function __construct(
        protected AdminService $adminService
    ) {}
    
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Admin::query();

            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($admin){
                            $btn = '<a href="'.route('superadmin.admins.edit', $admin->id).'" class="edit-admin btn btn-primary btn-sm">Edit</a>';
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
          
        return view('super_admin.admin.list');
    }

    public function create()
    {
        return view('super_admin.admin.create', [
            'pageTitle' => 'Create',
            'admin' => new Admin(),
        ]);
    }

    public function store(AdminRequest $request)
    {
        $this->adminService->create($request->validated());
        return redirect()->route('superadmin.admins.index')->with('success', 'Admin updated successfully.');
    }

    public function edit(Admin $admin)
    {
        return view('super_admin.admin.create', [
            'pageTitle' => 'Edit',
            'admin' => $admin,
        ]);
    }

    public function update(AdminRequest $request, Admin $admin)
    {
        $this->adminService->update($admin, $request->validated());
        return redirect()->route('superadmin.admins.index')->with('success', 'Admin updated successfully.');
    }
}
