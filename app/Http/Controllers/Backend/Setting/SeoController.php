<?php

namespace App\Http\Controllers\Backend\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Setting\Seo;

class SeoController extends Controller
{
    public function seo(){
        $seo = Seo::find(1);
        return view('backend.setting.seo.seo', compact('seo'));
    }

    public function updateSEO(Request $request, $id){
        $seo = Seo::find($id);
        $seo->meta_author=$request->meta_author;
        $seo->meta_title=$request->meta_title;
        $seo->meta_keyword=$request->meta_keyword;
        $seo->meta_description=$request->meta_description;
        $seo->google_analytics=$request->google_analytics;
        $seo->google_verification=$request->google_verification;
        $seo->alexa_analytics=$request->alexa_analytics;
        $seo->save();
        return back()->with([
            'message' => 'Successfully Updated',
            'alert-typ' => 'success'
        ]);
    }
}
