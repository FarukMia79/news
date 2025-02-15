<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Distric;
use App\Models\Backend\Division;

class DistricController extends Controller
{
    public function index(){
        $division = Division::all();
        $distric = Distric::all();
        return view('backend.distric.index', compact('distric', 'division'));
    }

    public function store(Request $request){
        $validate = $request->validate([
            'distric_en' => 'required|unique:districs|max:100',
            'distric_bn' => 'required|unique:districs|max:100',
        ]);

        $distric = new Distric;
        $distric->distric_en=$request->distric_en;
        $distric->distric_bn=$request->distric_bn;
        $distric->division_id=$request->division_id;
        $distric->save();

        $notification=array('message' => 'Successfully Created', 'alert-type' => 'success');
        return back()->with($notification);
    }

    public function edit($id){
        $division = Division::all();
        $distric = Distric::find($id);
        return view('backend.distric.edit', compact('distric', 'division'));
    }

    public function update(Request $request, $id){
        $validate = $request->validate([
            'distric_en' => 'required|max:100',
            'distric_bn' => 'required|max:100',
        ]);

        $distric = Distric::find($id);
        $distric->distric_en=$request->distric_en;
        $distric->distric_bn=$request->distric_bn;
        $distric->division_id=$request->division_id;
        $distric->save();

        $notification=array('message' => 'Successfully Updated', 'alert-type' => 'success');
        return redirect()->Route('distric.index')->with($notification);
    }

    public function destroy($id){
        Distric::destroy($id);
        $notification = array('message' => 'Successfully Deleted', 'alert-type' => 'success');
        return back()->with($notification);
    }
}
