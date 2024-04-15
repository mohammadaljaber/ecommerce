<?php

namespace App\Http\Controllers;

use App\Http\Requests\colorformrequest;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index(){
        $colors=Color::all();
        return view('admin.colors.index',compact('colors'));
    }
    public function create(){
        return view('admin.colors.create');
    }
    public function store(colorformrequest $request){
        $data=$request->validated();
        Color::create([
            'name'=>$data['name'],
            'code'=>$data['code'],
            'status'=>isset($request->status)? 1:0
        ]);
        return redirect('admin/colors')->with('message','color added successfully');
    }
    public function delete($id){
        Color::where('id',$id)->delete();
        return redirect('admin/colors')->with('message','color deleted successfully');
    }
    public function edit($id){
        $color=Color::where('id',$id)->first();
        return view('admin.colors.edit',compact('color'));
    }
    public function update(colorformrequest $request,$id){
        $data=$request->validated();
        Color::where('id',$id)->update([
            'name'=>$data['name'],
            'code'=>$data['code'],
            'status'=>isset($request->status)? 1:0
        ]);
        return redirect('admin/colors')->with('message','color updated successfully');
    }
}
