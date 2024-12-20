<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Order;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Admin::query();

            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($admin){
                            $btn = '<a href="'.route('superadmin.orders.edit', $admin->id).'" class="edit btn btn-primary btn-sm">Edit</a>';
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
          
        return view('super_admin.order.list');
    }
}
