<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserComment extends Model
{
    use HasFactory;

    protected $table = "user_comment";
    public $timestamps = false;
    protected $fillable = [
        'user_id',
        'content',
        'product_id',
        'star',
        'comment_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product_detail()
    {
        return $this->belongsTo(Product_Detail::class);
    }


    // public function product_images()
    // {
    //     return $this->hasMany(ProductImage::class);
    // }
}
