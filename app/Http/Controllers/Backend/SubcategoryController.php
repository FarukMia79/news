<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\category;
use App\Models\Backend\Subcategory;

class SubcategoryController extends Controller
{
    public function index(){
        $category = Category::all();
        $subcategory = Subcategory::all();
        return view('backend.subcategory.index', compact('subcategory', 'category'));
    }

    public function store(Request $request){
        $validate=$request->validate([
            'subcategory_en' => 'required|unique:subcategories|max:55',
            'subcategory_bn' => 'required|unique:subcategories|max:55',
            'category_id' => 'required',
        ]);

        //__ insert method __//
        $subcategory = new Subcategory;
        $subcategory->subcategory_en=$request->subcategory_en;
        $subcategory->subcategory_bn=$request->subcategory_bn;
        $subcategory->category_id=$request->category_id;
        $subcategory->save();

        $notification=array('message' => 'Sub Category Insered!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function edit($id){
        $category = Category::all();
        $subcategory = Subcategory::find($id);
        return view('backend.subcategory.edit', compact('subcategory', 'category'));
    }

    public function update(Request $request, $id){
        $validate=$request->validate([
            'subcategory_en' => 'required|max:55',
            'subcategory_bn' => 'required|max:55',
            'category_id' => 'required',
        ]);

        //__ insert method __//
        $subcategory = Subcategory::find($id);
        $subcategory->subcategory_en=$request->subcategory_en;
        $subcategory->subcategory_bn=$request->subcategory_bn;
        $subcategory->category_id=$request->category_id;
        $subcategory->save();

        $notification=array('message' => 'Sub Category Updated!', 'alert-type' => 'success');
        return redirect()->Route('subcategory.index')->with($notification);
    }

    public function destroy($id){
        Subcategory::destroy($id);
        $notification=array('message' => 'Sub Category Deleted!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}
