<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductColor extends Model
{
    use HasFactory;

    protected $table = "product_colors";

    public function product_details()
    {
        return $this->hasMany(ProductDetail::class);
    }
}
