<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = "orders";

    protected $fillable = [
        'user_id',
        'fullname',
        'discount_id',
        'phone_number',
        'address',
        'note',
        'total_price',
    ];

    public function order_details()
    {
        return $this->hasMany(OrderDetail::class);
    }

    // public function product_images()
    // {
    //     return $this->hasMany(ProductImage::class);
    // }
}
