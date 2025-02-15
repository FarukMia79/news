<?php

namespace App\Models\Backend\Setting;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    protected $fillable = [
        'facebook',
        'twitter', 
        'linkedin',
        'youtube'
    ];
}
