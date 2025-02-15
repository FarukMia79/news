<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $fillable = [
        'subcategory_en',
        'subcategory_bn', 
        'category_id'
    ];
    public function category(){
        return $this->belongsTo(Category::class, 'category_id'); //join with categories table
    }

    public function setSubcategoryEnAttribute($value){
        $this->attributes['subcategory_en']=ucfirst($value);
    }
}
