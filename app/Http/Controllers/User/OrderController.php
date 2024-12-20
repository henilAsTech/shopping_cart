<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\OrderRequest;
use App\Models\Order;
use App\Services\OrderService;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class OrderController extends Controller
{
    public function __construct(
        protected OrderService $orderService
    ) {}
    
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Order::query();

            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($admin){
                            $btn = '<a href="'.route('superadmin.admins.edit', $admin->id).'" class="edit-admin btn btn-primary btn-sm">Edit</a>';
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
          
        return view('user.order.list');
    }

    public function store(OrderRequest $request)
    {
        $this->orderService->create($request->validated());
        return redirect()->route('superadmin.admins.index')->with('success', 'Admin updated successfully.');
    }
}
