<?php

namespace App\Http\Controllers\Backend\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Setting\Social;

class SocialController extends Controller
{
    public function edit(){
        $social = Social::find(1);
        return view('backend.social.social', compact('social'));
    }

    public function updateSocial(Request $request, $id){
        $social = Social::find($id);
        $social->facebook=$request->facebook;
        $social->twitter=$request->twitter;
        $social->linkedin=$request->linkedin;
        $social->youtube=$request->youtube;
        $social->save();

        $notification = array('message' => 'Successfully Updated', 'alert-type' => 'success');
        return back()->with($notification);
    }
}
