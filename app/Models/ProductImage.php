<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = "product_images";
    protected $fillable = [
        "url",
        "product_id"
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
