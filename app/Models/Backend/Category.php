<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function setCategoryEnAttribute($value){
        $this->attributes['category_en']=ucfirst($value);
    }
}
