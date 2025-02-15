<?php

namespace App\Http\Controllers\backend\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Setting\Namaz;

class NamazController extends Controller
{
    public function namaz(){
        $namaz = Namaz::find(1);
        return view('backend.setting.namaz', compact('namaz'));
    }

    public function updateNamaz(Request $request, $id){
        $namaz = Namaz::find($id);
        $namaz->fajr=$request->fajr;
        $namaz->dhuhr=$request->dhuhr;
        $namaz->asr=$request->asr;
        $namaz->maghrib=$request->maghrib;
        $namaz->isha=$request->isha;
        $namaz->jummah=$request->jummah;
        $namaz->save();
        return back()->with([
            'message' => 'Successfully Updated',
            'alert-type' => 'success'
        ]);
    }
}
