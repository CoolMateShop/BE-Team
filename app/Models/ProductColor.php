<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductColor extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "product_colors";
    protected $fillable = [
        'color',
        'color_value',
    ];
    public function product_details()
    {
        return $this->hasMany(ProductDetail::class);
    }
}
