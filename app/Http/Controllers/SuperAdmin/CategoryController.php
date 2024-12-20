<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SuperAdmin\CategoryRequest;
use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CategoryController extends Controller
{
    public function __construct(
        protected CategoryService $categoryService
    ) {}

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Category::query();

            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('status', function ($category) {
                        return '<a href="'.route('superadmin.category.status', $category->id).'" class="status-update btn '.($category->status == 0 ? 'btn-danger' : 'btn-success').' btn-sm">'.($category->status == 0 ? 'Inactive' : 'Active') .'</a>';
                    })
                    ->addColumn('action', function($category){
                            return '<a href="'.route('superadmin.categories.edit', $category->id).'" class="edit btn btn-primary btn-sm">Edit</a>';
                    })
                    ->rawColumns(['status', 'action'])
                    ->make(true);
        }
          
        return view('super_admin.category.list');
    }

    public function create()
    {
        return view('super_admin.category.create', [
            'pageTitle' => 'Create',
            'category' => new Category(),
        ]);
    }

    public function store(CategoryRequest $request)
    {
        $this->categoryService->create($request->validated());
        return redirect()->route('superadmin.categories.index')->with('success', 'Category updated successfully.');
    }

    public function edit(Category $category)
    {
        return view('super_admin.category.create', [
            'pageTitle' => 'Edit',
            'category' => $category,
        ]);
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $this->categoryService->update($category, $request->validated());
        return redirect()->route('superadmin.categories.index')->with('success', 'Catgory updated successfully.');
    }

    public function updateStatus(Category $category)
    {
        $this->categoryService->updateStatus($category);
        return redirect()->route('superadmin.categories.index')->with('success', 'Category status updated successfully.');
    }
}
