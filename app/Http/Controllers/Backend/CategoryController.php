<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Category;


class CategoryController extends Controller
{
    public function index(){
        $category = Category::all();
        return view('backend.category.index', compact('category'));
    }

    public function store(Request $request){
        $validate=$request->validate([
            'category_en' => 'required|unique:categories|max:55',
            'category_bn' => 'required|unique:categories|max:55',
        ]);

        //__ insert method __//
        $category = new Category;
        $category->category_en=$request->category_en;
        $category->category_bn=$request->category_bn;
        $category->save();

        $notification=array('message' => 'Category Inserted!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function edit($id){
        $data = Category::find($id);
        return view('backend.category.edit', compact('data'));
    }

    public function update(Request $request, $id){
        $validate=$request->validate([
            'category_en' => 'required|max:55',
            'category_bn' => 'required|max:55',
        ]);

        //__ insert method __//
        $category =Category::find($id);
        $category->category_en=$request->category_en;
        $category->category_bn=$request->category_bn;
        $category->save();

        $notification=array('message' => 'Category Inserted!', 'alert-type' => 'success');
        return redirect()->Route('category.index')->with($notification);
    }

    public function destroy($id){
        Category::destroy($id);

        $notification = array('message'=>'Category Successfully Deleted', 'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }
}
