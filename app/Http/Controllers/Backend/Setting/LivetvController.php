<?php

namespace App\Http\Controllers\Backend\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\Models\Backend\Setting\Livetv;

class LivetvController extends Controller
{
    public function livetv(){
        $livetv = Livetv::find(1);
        return view('backend.setting.livetv', compact('livetv'));
    }

    public function updateLiveTv(Request $request, $id){
        $livetv = Livetv::find($id);
        $livetv->embed_cod=$request->embed_cod;
        $livetv->save();
        return back()->with([
            'message' => 'Successfully Updated',
            'alert-type' => 'success'
        ]);
    }

    public function ActiveLiveTv($id){
        $active = Livetv::find($id);
        $active->status=1;
        $active->save();
        return back()->with([
            'message' => 'Active',
            'alert-type' => 'success'
        ]);
    }

    public function DeactiveLiveTv($id){
        $deactive = Livetv::find($id);
        $deactive->status=0;
        $deactive->save();
        return back()->with([
            'message' => 'Deactive',
            'alert-type' => 'success'
        ]);
    }
}
