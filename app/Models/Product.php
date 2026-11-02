<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
#[Fillable('name','price','category_id')]
class Product extends Model
{
    public function category()
    {
        return $this->belongsTo(category::class);
    }
}
