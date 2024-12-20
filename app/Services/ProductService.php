<?php

namespace App\Services;

use App\Models\Product;

class ProductService
{
    public function __construct(
        protected ProductImageService $productImageService
    ) {}

    public function getActive()
    {
        return Product::with('images')->active()->get();
    }

    public function getAll()
    {
        return Product::with('images')->get();
    }

    public function getTrashed()
    {
        return Product::onlyTrashed()->get();
    }

    public function create(array $data): Product
    {
        $product = Product::create($data);
        $data['product_id'] = $product->id; 

        if (isset($data['image_array']) && count($data['image_array']) > 0) {
            $this->productImageService->create($data);
        }
        
        return $product;
    }
    
    public function update(Product $product, array $data): Product
    {
        $product->update($data);
        
        $data['product_id'] = $product->id; 

        if (isset($data['image_array']) && count($data['image_array']) > 0) {
            $this->productImageService->create($data);
        }

        return $product;
    }

    public function updateStatus(Product $product)
    {
        $product->status = $product->status == 'active' ? 'inactive' : 'active';
        return $product->save();
    }
}