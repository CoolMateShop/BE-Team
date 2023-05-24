<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = "products";

    protected $fillable = [
        'name',
        'price',
        'sale',    
        'description',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function product_colors()
    {
        return $this->hasMany(ProductColor::class);
    }

    public function product_images()
    {
        return $this->hasMany(ProductImage::class);
    }
}
