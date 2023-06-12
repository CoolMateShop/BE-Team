<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillDetail extends Model
{
    use HasFactory;
    protected $table = "order_details";
    public $timestamps = false;

    public function orders(){
        return $this->belongsTo(Bill::class, 'order_id');
    }

    public function productDetail(){
        return $this->hasMany(ProductDetail::class, 'id');
    }
}
