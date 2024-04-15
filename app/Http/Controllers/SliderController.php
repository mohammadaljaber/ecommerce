<?php

namespace App\Http\Controllers;

use App\Http\Requests\sliderrequest;
use App\Models\Product_image;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class SliderController extends Controller
{
    public function index(){
        $sliders=Slider::all();
        return view('admin.sliders.index',compact('sliders'));
    }
    public function create(){
        return view('admin.sliders.create');
    }
    public function store(sliderrequest $request){
        
        $data=$request->validated();
        if($request->hasFile('image')){
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $filename=time().'.'.$ext;
            $file->move('uploads/sliders/',$filename);
            $data['image']="uploads/sliders/$filename";
        }
        Slider::create([
            'title'=>$data['title'],
            'description'=>$data['description'],
            'image'=>$data['image'],
            'status'=>isset($request->status)?'1':'0'
        ]);
        return redirect('admin/sliders')->with('message','Slider Added Successfully');
    }

    public function edit($id){
        $slider=Slider::where('id',$id)->first();
        return view('admin.sliders.edit',compact('slider'));
    }
    public function update(sliderrequest $request,Slider $slider){
        $data=$request->validated();
        if($request->hasFile('image')){
            if(File::exists($slider->image))
                {File::delete($slider->image);}
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $filename=time().'.'.$ext;
            $file->move('uploads/sliders/',$filename);
            $data['image']="uploads/sliders/$filename";
        }   
        Slider::where('id',$slider->id)->update([
            'title'=>$data['title'],
            'description'=>$data['description'],
            'image'=>$data['image'] ?? $slider->image,
            'status'=>isset($request->status)?'1':'0'
        ]);
        return redirect('admin/sliders')->with('message','Slider Updated Successfully');
    }
    public function delete(Slider $slider){
        if(File::exists($slider->image)){
            File::delete($slider->image);
        }
        Slider::destroy($slider->id);
        return redirect('admin/sliders')->with('message','Slider Deleted Successfully');
    }
}
