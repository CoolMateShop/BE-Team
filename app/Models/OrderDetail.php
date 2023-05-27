<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = "order_details";

    protected $fillable = [
        'product_detail_id',
        'order_id',
        'count',
        'price',
        'subtotal',
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
