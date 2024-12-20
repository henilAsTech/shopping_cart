<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait Searchable
{
    public function scopeActive(Builder $query): void
    {
        $query->where('status', 1);
    }

    public function scopeInactive(Builder $query): void
    {
        $query->where('status', 0);
    }
}
