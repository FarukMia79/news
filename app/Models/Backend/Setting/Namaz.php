<?php

namespace App\Models\Backend\Setting;

use Illuminate\Database\Eloquent\Model;

class Namaz extends Model
{
    protected $filiable = [
        'fajr',
        'dhuhr',
        'asr',
        'maghrib',
        'isha',
        'jummah',
    ];
}
