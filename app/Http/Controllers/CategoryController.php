<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\addcategory;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index(){
        return view('admin.categore.index');
    }

    public function create(){
        return view('admin.categore.create');
    }
    public function store(addcategory $request){
        $validatedate=$request->validated();
        // dd($validatedate);
        $category=new Category;
        $category->name=$validatedate['name'];
        $category->slug=str::slug($validatedate['slug']);
        $category->description=$validatedate['description'];

        if($request->hasFile('image')){
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $filename=time().'.'.$ext;
            $file->move('uploads/category',$filename);
            $category->image=$filename;
        }
        $category->meta_title=$validatedate['meta_title'];
        $category->meta_keyword=$validatedate['meta_keyword'];
        
        $category->meta_description=$validatedate['meta_description'];

        $category->status=isset($request->status) == true ? '1':'0';
        $category->save();
        // dd($category);
        return redirect('admin/category')->with('message','category added successfully');

    }

    public function edit(Category $category) {
        return view('admin.categore.edit',compact('category'));
    }
    public function update(addcategory $newcategory,$id) {
        $category=Category::find($id);
        $validatedate=$newcategory->validated();
        // dd($validatedate);
        
        $category->name=$validatedate['name'];
        $category->slug=str::slug($validatedate['slug']);
        $category->description=$validatedate['description'];

        if($newcategory->hasFile('image')){

            $path='uploads/category/'.$category->image;
            if(File::exists($path)){
                File::delete($path);
            }

            $file=$newcategory->file('image');
            $ext=$file->getClientOriginalExtension();
            $filename=time().'.'.$ext;
            $file->move('uploads/category',$filename);
            $category->image=$filename;
        }
        $category->meta_title=$validatedate['meta_title'];
        $category->meta_keyword=$validatedate['meta_keyword'];
        
        $category->meta_description=$validatedate['meta_description'];

        $category->status=isset($newcategory->status) == true ? '1':'0';
        $category->update();
        // dd($category);
        return redirect('admin/category')->with('message','category updated successfully');

    }
}
