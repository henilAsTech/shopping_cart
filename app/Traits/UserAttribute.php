<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait UserAttribute
{
    public function getImageUrlAttribute(): string
    {
        $media = asset('app/public/' . $this->guard . 's/' . $this->image);
        if (file_exists('app/public/' . $this->guard . 's/' . $this->image)) {
            return $media;
        }
        return asset('file/images/user.png');
    }
}
