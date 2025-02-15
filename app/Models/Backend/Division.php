<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    public function setDivisionEnAttribute($value){
        $this->attributes['division_en']=ucfirst($value);
    }
}
