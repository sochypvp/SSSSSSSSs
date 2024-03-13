<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = "products";
    protected $guarded = ["id"];

    public function getAllProduct(){
        return $this->hasMany(ProductImages::class, 'productId');
    }

    public function productImg(){
        return $this->hasMany(ProductImages::class, 'productId');
    }

    public function subCategory(){
        return $this->belongsTo(Sub_categories::class);
    }
}
