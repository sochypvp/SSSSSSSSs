<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sub_categories extends Model
{
    use HasFactory;

    public function mainCategories(){
        return $this->belongsTo(Main_categories::class);
    }
}
