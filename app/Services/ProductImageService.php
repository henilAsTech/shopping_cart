<?php

namespace App\Services;

use App\Models\ProductImage;

class ProductImageService
{
    public function create(array $data)
    {
        foreach ($data['image_array'] as $image) {
            ProductImage::create([
                'image' => $image,
                'product_id' => $data['product_id']
            ]);
        }
        return true;
    }
    
    public function update(ProductImage $ProductImage, array $data): ProductImage
    {
        $ProductImage->update($data);
        return $ProductImage;
    }
}