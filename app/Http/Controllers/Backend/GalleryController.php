<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Photo;
use Intervention\Image\Facades\Image;
use App\Models\Backend\Video;
use Redirect;

class GalleryController extends Controller
{
    public function photo(){
        $photo = Photo::all();
        return view('backend.gallery.photo', compact('photo'));
    }

    public function store(Request $request) {
        $validate = $request->validate([
            'title' => 'required|unique:photos',
            'type' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $photo = new Photo;
        $photo->title = $request->title;
        $photo->type = $request->type;
    
        if($request->hasFile('photo')) {
            $image = $request->file('photo');  
            $photo_name = uniqid().'.'.$image->getClientOriginalExtension();
            $uploadPath = public_path('upload/gallery/photo');
    
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }
    
            Image::make($image)->resize(500, 310)->save($uploadPath.'/'.$photo_name);
            $photo->photo = 'upload/gallery/photo/' . $photo_name;
        }
    
        $photo->save();
    
        return back()->with([
            'message' => 'Successfully Inserted!',
            'alert-type' => 'success'
        ]);
    }

    public function edit($id){
        $photo = Photo::find($id);
        return view('backend.gallery.edit', compact('photo'));
    }

    public function update(Request $request, $id){
        $validate = $request->validate([
            'title' => 'required',
            'type' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $photo = Photo::find($id);
        $photo->title = $request->title;
        $photo->type = $request->type;
    
        if($request->hasFile('photo')) {
            $image = $request->file('photo');  
            $photo_name = uniqid().'.'.$image->getClientOriginalExtension();
            $uploadPath = public_path('upload/gallery/photo');
    
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }
    
            Image::make($image)->resize(500, 310)->save($uploadPath.'/'.$photo_name);

            if(file_exists(public_path($photo->photo))){
                unlink(public_path($photo->photo));
            }
            $photo->photo = 'upload/gallery/photo/' . $photo_name;
        }
    
        $photo->save();
    
        return Redirect()->Route('photo.gallery')->with([
            'message' => 'Successfully Updated!',
            'alert-type' => 'success'
        ]);
    }

    public function destroy($id){
        Photo::destroy($id);
        return back()->with([
            'message' => 'Successfully Deleted!',
            'alert-type' => 'success'
        ]);
    }
    

    public function video(){
        $video = Video::all();
        return view('backend.gallery.video.index', compact('video'));
    }

    public function storeVideo(Request $request){
        $validate= $request->validate([
            'title' => 'required',
            'type' => 'required',
            'embed_code' => 'required'
        ]);

        $video = new Video;
        $video->title=$request->title;
        $video->type=$request->type;
        $video->embed_code=$request->embed_code;
        $video->save();
        return back()->with([
            'message' => 'Successfully Inserted!',
            'alert-type' => 'success'
        ]);
    }

    public function editVideo($id){
        $video = Video::find($id);
        return view('backend.gallery.video.edit', compact('video'));
    }

    public function updateVideo(Request $request, $id){
        $validate= $request->validate([
            'title' => 'required',
            'type' => 'required',
            'embed_code' => 'required'
        ]);

        $video = Video::find($id);
        $video->title=$request->title;
        $video->type=$request->type;
        $video->embed_code=$request->embed_code;
        $video->save();
        return redirect()->Route('video.gallery')->with([
            'message' => 'Successfully Updated!',
            'alert-type' => 'success'
        ]);
    }

    public function destroyVideo($id){
        Video::destroy($id);
        return back()->with([
            'message' => 'Successfully Deleted!',
            'alert-type' => 'success'
        ]);
    }
}
