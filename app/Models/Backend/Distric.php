<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class Distric extends Model
{
    protected $fillable = [
        'division_id',
        'distric_bn', 
        'distric_en'
    ];

    public function setDistricEnAttribute($value){
        $this->attributes['distric_en']=ucfirst($value);
    }
    public function division(){
        return $this->belongsTo(Division::class, 'division_id'); //join with distric table
    }
}
