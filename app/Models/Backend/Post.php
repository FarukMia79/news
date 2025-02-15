<?php

namespace App\Models\Backend;
use App\Models\Backend\Category;
use App\Models\Backend\Subcategory;
use App\Models\Backend\Division;
use App\Models\Backend\Distric;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'cat_id', 
        'subcat_id',
        'divi_id',
        'dist_id',
        'suer_id',
        'title_bn',
        'title_en',
        'image',
        'description_bn',
        'description_en',
        'tags_bn',
        'tags_en',
        'headline',
        'first_section',
        'first_section_thumbnail',
        'bigthumbnail',
        'post_date',
        'post_month'
    ];
    public function category(){
        return $this->belongsTo(Category::class, 'cat_id');
    }

    public function subcategory(){
        return $this->belongsTo(Subcategory::class, 'subcat_id');
    }

    public function division(){
        return $this->belongsTo(Division::class, 'divi_id');
    }

    public function distric(){
        return $this->belongsTo(Distric::class, 'dist_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
