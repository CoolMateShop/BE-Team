<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    use HasFactory;

    protected $table = "product_details";
    public $timestamps = false;
    protected $fillable = [
        'size',
        'product_color_id',
    ];

    public  function product_color()
    {
        return $this->belongsTo(ProductColor::class);
    }
}
