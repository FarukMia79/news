<?php

namespace App\Http\Controllers\Backend\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Setting\Notice;

class NoticeController extends Controller
{
    public function notice(){
        $notice = Notice::all();
        return view('backend.setting.notice', compact('notice'));
    }

    public function UpdateNotice(Request $request, $id){
        $notice = Notice::find($id);
        $notice->notice=$request->notice;
        $notice->save();
        return back()->with([
            'message' => 'Successfully Updated',
            'alert-type' => 'success'
        ]);
    }

    public function ActiveNotice($id){
        $active = Notice::find($id);
        $active->status=1;
        $active->save();
        return back()->with([
            'message' => 'Active',
            'alert-type' => 'success'
        ]);
    }

    public function DeactiveNotice($id){
        $deactive = Notice::find($id);
        $deactive->status=0;
        $deactive->save();
        return back()->with([
            'message' => 'Deactive',
            'alert-type' => 'success'
        ]);
    }
}
