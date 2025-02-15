<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Subcategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Backend\Post;
use App\Models\Backend\Category;
use App\Models\backend\Distric;
use App\Models\Backend\Division;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;


class PostController extends Controller
{
    public function index(){
        $post = Post::all();
        return view('backend.post.index', compact('post'));
    }

    public function create(){
        $category= Category::all();
        $division = Division::all();
        return view('backend.post.create', compact('category', 'division'));
    }

    public function store(Request $request){
        $validate = $request->validate([
            'title_en' => 'required|unique:posts',
            'title_bn' => 'required|unique:posts',
            'subcat_id' => 'required',
            'dist_id' => 'required',
            'post_date' => 'required',
            'tags_bn' => 'required',
            'tags_en' => 'required',
            'description_en' => 'required',
            'description_bn' => 'required',
        ]);

        $post = new Post;
        $post->title_bn=$request->title_bn;
        $post->title_en=$request->title_en;
        $post->slug_bn=Str::of($request->title_bn)->slug('-');
        $post->slug_en=Str::of($request->title_en)->slug('-');
        $post->cat_id=$request->cat_id;
        $post->subcat_id=$request->subcat_id;
        $post->divi_id=$request->divi_id;
        $post->dist_id=$request->dist_id;
        $post->user_id=Auth::id();
        $post->tags_bn=$request->tags_bn;
        $post->tags_en=$request->tags_en;
        $post->description_en=$request->description_en;
        $post->description_bn=$request->description_bn;
        $post->headline=$request->headline;
        $post->first_section=$request->first_section;
        $post->first_section_thumbnail=$request->first_section_thumbnail;
        $post->bigthumbnail=$request->bigthumbnail;
        $post->post_date=date('d-m-Y');
        $post->post_month=date('F');
        $image = $request->image;

        If($image){
            $image_name=uniqid().'.'.$image->getClientOriginalExtension();

            // Ensure the upload directory exists
            $uploadPath = public_path('upload/postimages');
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }

            Image::make($image)->resize(500, 310)->save($uploadPath . '/' . $image_name);
            $post->image = 'upload/postimages/' . $image_name;

            $post->save();
            $notification=array('message' => 'Successfully Post Inserted', 'alert-type' => 'success');
            return back()->with($notification);
        }
    }

    public function edit($id){
        $post = Post::find($id);
        $category= Category::all();
        $division = Division::all();
        $subcategory = Subcategory::all()->where('category_id', $post->cat_id);
        $distric = Distric::all()->where('division_id', $post->divi_id);

        return view('backend.post.edit', compact('post', 'category', 'division', 'subcategory', 'distric'));
    }

    public function update(Request $request, $id){
        $post = Post::find($id);

        $validate = $request->validate([
            'title_en' => 'required',
            'title_bn' => 'required',
            'subcat_id' => 'required',
            'dist_id' => 'required',
            'tags_bn' => 'required',
            'tags_en' => 'required',
            'description_en' => 'required',
            'description_bn' => 'required',
        ]);

        $post->title_bn = $request->title_bn;
        $post->title_en = $request->title_en;
        $post->slug_bn=Str::slug($request->title_bn, '-');
        $post->slug_en=Str::of($request->title_en)->slug('-');
        $post->cat_id = $request->cat_id;
        $post->subcat_id = $request->subcat_id;
        $post->divi_id = $request->divi_id;
        $post->dist_id = $request->dist_id;
        $post->user_id = Auth::id();
        $post->tags_bn = $request->tags_bn;
        $post->tags_en = $request->tags_en;
        $post->description_en = $request->description_en;
        $post->description_bn = $request->description_bn;
        $post->headline = $request->headline ?? 0;
        $post->first_section = $request->first_section ?? 0;
        $post->first_section_thumbnail = $request->first_section_thumbnail ?? 0;
        $post->bigthumbnail = $request->bigthumbnail ?? 0;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = uniqid() . '.' . $image->getClientOriginalExtension();
            $uploadPath = public_path('upload/postimages');

            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }

            Image::make($image)->resize(500, 310)->save($uploadPath . '/' . $image_name);

            // Delete old image if exists
            if (file_exists(public_path($post->image))) {
                unlink(public_path($post->image));
            }

            $post->image = 'upload/postimages/' . $image_name;
        }

        $post->save();

        return redirect()->Route('post.index')->with([
            'message' => 'Successfully Post Updated!',
            'alert-type' => 'success'
        ]);
    }

    public function destroy($id){
        $post = Post::find($id);
        unlink($post->image);
        Post::destroy($id);
        $notification=array('message' => 'Successfully Post Deleted', 'alert-type' => 'success');
        return back()->with($notification);
    }

    public function GetSubcate($cat_id){
        //$category_id = $cat_id;
        //$sub = Subcategory::find($category_id);
        $sub = DB::table('subcategories')->where('category_id', $cat_id)->get();
        return response()->json($sub);
    }

    public function Getdistric($divi_id){
        $dist = DB::table('districs')->where('division_id', $divi_id)->get();
        return response()->json($dist);
    }

}
