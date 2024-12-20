<?php

namespace App\Models;

use App\Traits\UserAttribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasUuids, UserAttribute;

    protected $guard = "product_image";

    protected $fillable = [
        'product_id', 
        'image', 
        'path',
        'format',
        'size',
        'width',
        'height'
    ]; 

    protected $appends = [
        'image_url',
    ];
}
