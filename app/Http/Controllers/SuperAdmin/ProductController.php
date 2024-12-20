<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SuperAdmin\ProductRequest;
use App\Models\Product;
use App\Services\CategoryService;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ProductController extends Controller
{
    public function __construct(
        protected CategoryService $categoryService,
        protected ProductService $productService,
    ) {}

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Product::query();

            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('category', function($product){
                        return $product->category->name;
                    })
                    ->addColumn('status', function($product){
                        return '<a href="'.route('superadmin.product.status', $product->id).'" class="status-update btn '.($product->status == 'inactive' ? 'btn-danger' : 'btn-success').' btn-sm">'.($product->status == 'inactive' ? 'Inactive' : 'Active') .'</a>';
                    })
                    ->addColumn('action', function($product){
                        $btn = '<a href="'.route('superadmin.products.edit', $product->id).'" class="edit btn btn-primary btn-sm">Edit</a>
                                <a href="javascript:void(0);" class="delete btn btn-danger btn-sm" onclick="showDeleteConfirmation(\'' . $product->id . '\')">Delete</a>';
                            return $btn;
                    })
                    ->rawColumns(['category', 'status', 'action'])
                    ->make(true);
        }
          
        return view('super_admin.product.list');
    }

    public function create() 
    {
        $category = $this->categoryService->getActive();
        return view('super_admin.product.create', [
            'pageTitle' => 'Create',
            'product' => new Product(),
            'categories' => $category
        ]);
    }

    public function store(ProductRequest $request)
    {
        $this->productService->create($request->validated());
        return redirect()->route('superadmin.products.index')->with('success', 'Product updated successfully.');
    }

    public function edit(Product $product)
    {
        $category = $this->categoryService->getAll();
        return view('super_admin.product.create', [
            'pageTitle' => 'Edit',
            'product' => $product,
            'categories' => $category
        ]);
    }

    public function update(ProductRequest $request, Product $product)
    {
        $this->productService->update($product, $request->validated());
        return redirect()->route('superadmin.products.index')->with('success', 'Product updated successfully.');
    }

    public function updateStatus(Product $product)
    {
        $this->productService->updateStatus($product);
        return redirect()->route('superadmin.products.index')->with('success', 'Product status updated successfully.');
    }

    public function hardDelete(Product $product) 
    {
        $product->forceDelete();
        return response()->json(['status' => 'success', 'message' => 'Product delete successfully.']);
    }

    public function softDelete(Product $product)
    {
        $product->delete();
        return response()->json(['status' => 'success', 'message' => 'Product delete successfully.']);
    }
}
