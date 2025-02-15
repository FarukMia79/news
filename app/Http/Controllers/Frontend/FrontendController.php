<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Category;
use App\Models\Backend\Distric;
use App\Models\Backend\Division;
use App\Models\Backend\Setting\Livetv;
use App\Models\Backend\Post;
use DB;

class FrontendController extends Controller
{
    //__ Frontend index method __//
    public function Frontend(){
        $tv = Livetv::all();
        $first_sec_thum = Post::where('first_section_thumbnail', 1)->orderBy('id', 'desc')->take(1)->get();
        $first_section = Post::where('first_section', '1')->where('first_section_thumbnail', '0')->orderBy('id', 'desc')->take(4)->get();
        $first_section_2 = Post::where('first_section', 1)->where('first_section_thumbnail', '0')->orderBy('id', 'desc')->skip(4)->take(6)->get();
        $firstcat = Category::all()->first();
        $fastcatPostBig = Post::where('cat_id', $firstcat->id)->where('bigthumbnail', '1')->orderBy('id', 'desc')->take(1)->get();
        $fastcatPostSm = Post::where('cat_id', $firstcat->id)->where('bigthumbnail', '0')->orderBy('id', 'desc')->take(4)->get();
        $secondtCat = Category::all()->skip(1)->first();
        $secondCatPostBig = Post::where('cat_id', $secondtCat->id)->where('bigthumbnail', '1')->orderBy('id', 'desc')->take(1)->get();
        $secondCatPostSm = Post::where('cat_id', $secondtCat->id)->where('bigthumbnail', '0')->orderBy('id', 'desc')->take(4)->get();
        $thirdCat = Category::all()->skip(2)->first();
        $thirdCatPostBig = Post::where('cat_id', $thirdCat->id)->where('bigthumbnail', '1')->orderBy('id', 'desc')->take(1)->get();
        $thirdCatPostSm = Post::where('cat_id', $thirdCat->id)->where('bigthumbnail', '0')->orderBy('id', 'desc')->take(3)->get();
        $fourthCat = Category::all()->skip(3)->first();
        $fourthCatPostBig = Post::where('cat_id', $fourthCat->id)->where('bigthumbnail', '1')->orderBy('id', 'desc')->take(1)->get();
        $fourthCatPostSm = Post::where('cat_id', $fourthCat->id)->where('bigthumbnail', '0')->orderBy('id', 'desc')->take(3)->get();
        $fifththCat = Category::all()->skip(4)->first();
        $fifthCatPostBig = Post::where('cat_id', $fifththCat->id)->where('bigthumbnail', '1')->orderBy('id', 'desc')->take(6)->get();
        $division = Division::all();


        return view('frontend.index', compact(
            'tv',
            'first_sec_thum',
                        'first_section',
                        'first_section_2',
                        'firstcat',
                        'fastcatPostBig',
                        'fastcatPostSm',
                        'secondtCat',
                        'secondCatPostBig',
                        'secondCatPostSm',
                        'thirdCat',
                        'thirdCatPostBig',
                        'thirdCatPostSm',
                        'fourthCat',
                        'fourthCatPostBig',
                        'fourthCatPostSm',
                        'fifththCat',
                        'fifthCatPostBig',
                        'division'
        ));
    }

    //__ English version method __//
    public function english(){
        session()->get('language');
        session()->forget('language');
        session()->put('language', 'english');
        return redirect()->back();
    }

    //__ Bangla version method __//
    public function bangla(){
        session()->get('language');
        session()->forget('language');
        session()->put('language', 'bangla');
        return redirect()->back();
    }

    public function Getdistric($divi_id){
        $dist = Distric::where('division_id', $divi_id)->get();
        //$dist = DB::table('districs')->where('division_id', $divi_id)->get();
        return response()->json($dist);
    }

    public function Getthana($divi_id){
        //
    }

    public function SinglePost($id){
        $singlepost = Post::where('id', $id)->get();
        return view('frontend.singlepost.singlepost', compact('singlepost'));
    }
}
