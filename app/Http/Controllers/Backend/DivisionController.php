<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Division;
class DivisionController extends Controller
{
    public function index(){
        $division = Division::all();
        return view('backend.division.index', compact('division'));
    }

    public function store(Request $request){
        $validate = $request->validate([
            'division_en' => 'required|unique:divisions|max:100',
            'division_bn' => 'required|unique:divisions|max:100',
        ]);

        $division = new Division;
        $division->division_en=$request->division_en;
        $division->division_bn=$request->division_bn;
        $division->save();

        $notification=array('message' => 'Division Successfully Created', 'alert-type' => 'success');
        return back()->with($notification);
    }

    public function edit($id){
        $data = Division::find($id);
        return view('backend.division.edit', compact('data'));
    }

    public function update(Request $request, $id){
        $validate = $request->validate([
            'division_en' => 'required|max:100',
            'division_bn' => 'required|max:100',
        ]);

        $division = Division::find($id);
        $division->division_en=$request->division_en;
        $division->division_bn=$request->division_bn;
        $division->save();

        $notification=array('message' => 'Successfully Updated', 'alert-type' => 'success');
        return redirect()->Route('division.index')->with($notification);
    }

    public function destroy($id){
        Division::destroy($id);
        $notification=array('message' => 'Successfully Deleted', 'alert-type' => 'success');
        return back()->with($notification);
    }
}
