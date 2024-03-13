<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Main_categories extends Model
{
    use HasFactory;

    protected $table = 'main_categories';
    protected $guarded = 'id';

    public function subCategories(){
        return $this->hasMany(Sub_categories::class, 'mainCategoryId');
    }
}
