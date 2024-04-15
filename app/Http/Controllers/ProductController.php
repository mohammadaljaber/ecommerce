<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Http\Requests\productrequest;
use App\Models\Color;
use App\Models\Product;
use App\Models\Product_image;
use App\Models\ProductColor;
// use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
public function index(){
    $products=Product::with('category')->get();
    return view('admin.products.index',compact('products')) ;
}

public function create(){
    $categories=Category::all();
    $brands=Brand::all();
    $colors=Color::where('status','0')->get();
    return view('admin.products.create',compact('categories','brands','colors')) ;
}

public function edit($id){
    $product=Product::with('category')->where('id',$id)->first();
    $categories=Category::get();
    $brands=Brand::all();
    $product_colors=$product->productcolor->pluck('color_id')->toarray();
    $colors=Color::whereNotIn('id',$product_colors)->get();
    return view('admin.products.edit',compact('product','categories','brands','colors'));
}

public function store(productrequest $product){
    $valedateddata=$product->validated();
    
    $category=Category::where('id',$valedateddata['category_id'])->first();
    $newproduct = $category->products()->create([
        'category_id'=>$valedateddata['category_id'],
        'name'=>$valedateddata['name'],
        'slug'=>Str::slug($valedateddata['slug']),
        'brand'=>$valedateddata['brand'],
        'samll_description'=>$valedateddata['samll_description'],
        'description'=>$valedateddata['description'],
        'meta_title'=>$valedateddata['meta_title'],
        'meta_description'=>$valedateddata['meta_description'],
        'meta_keyword'=>$valedateddata['meta_keyword'],
        'original_price'=>$valedateddata['original_price'],
        'selling_price'=>$valedateddata['selling_price'],
        'quantity'=>$valedateddata['quantity'],
        'trinding'=>isset($valedateddata['trinding'])? 1:0,
        'status'=>isset($valedateddata['status'])? 1:0
    ]);
    if($product->hasFile('image')){
        $i=1;
        $uploadfils='uploads/products';
        foreach($product->file('image') as $imagefile){
            $extention=$imagefile->getClientOriginalExtension();
            $filename=time().$i++.'.'.$extention;
            $imagefile->move($uploadfils,$filename);
            $final_image_path_name=$uploadfils.'/'.$filename;
            Product_image::create([
                'products_id'=>$newproduct->id,
                'image'=>$final_image_path_name
            ]);
        }
    }
    if($product->colors){
        foreach($product->colors as $key => $color){
            $newproduct->productcolor()->create([
                'product_id'=>$newproduct->id,
                'color_id'=>$color,
                'quantity'=>$product->colorquantity[$key]??0
            ]);
        }
    }
    // return back()->with('message','Product Added Succesfully');
    return redirect('/admin/products')->with('message','Product Added Succesfully');

}
public function update($id,productrequest $request){
    if($request->todelete){
        $images=Product_image::whereIn('id',$request->todelete)->get();
        foreach($images as $image){
            if( File::exists($image->image)){
                File::delete($image->image);
            }
        }
        Product_image::destroy($request->todelete);
    }
    if($request->hasFile('image')){
        $i=1;
        $uploadfils='uploads/products';
        foreach($request->file('image') as $imagefile){
            $extention=$imagefile->getClientOriginalExtension();
            $filename=time().$i++.'.'.$extention;
            $imagefile->move($uploadfils,$filename);
            $final_image_path_name=$uploadfils.'/'.$filename;
            Product_image::where('id',$id)->create([
                'products_id'=>$id,
                'image'=>$final_image_path_name
            ]);
        }
    }
    $valedateddata=$request->validated();
    $newproduct=Product::where('id',$id)->update([
        'category_id'=>$valedateddata['category_id'],
        'name'=>$valedateddata['name'],
        'slug'=>Str::slug($valedateddata['slug']),
        'brand'=>$valedateddata['brand'],
        'samll_description'=>$valedateddata['samll_description'],
        'description'=>$valedateddata['description'],
        'meta_title'=>$valedateddata['meta_title'],
        'meta_description'=>$valedateddata['meta_description'],
        'meta_keyword'=>$valedateddata['meta_keyword'],
        'original_price'=>$valedateddata['original_price'],
        'selling_price'=>$valedateddata['selling_price'],
        'quantity'=>$valedateddata['quantity'],
        'trinding'=>isset($valedateddata['trinding'])? 1:0,
        'status'=>isset($valedateddata['status'])? 1:0
    ]);
    if($request->colors){
        foreach($request->colors as $key => $color){
            $newproduct->productcolor()->create([
                'product_id'=>$newproduct->id,
                'color_id'=>$color,
                'quantity'=>$request->colorquantity[$key]??0
            ]);
        }
    }
    return redirect('/admin/products')->with('message','Product Updated Succesfully');
}

public function delete($id){
    $product=Product::where('id',$id)->first();
    if(isset($product->productImages)){
        foreach($product->productImages as $image){
            if( File::exists($image->image)){
                File::delete($image->image);
            }
        }
    }
    $product->delete();
    return redirect('/admin/products')->with('message','Product Deleted Succesfully');
}
public function updateproductcolor(Request $request,$prod_color_id){
    // $product=Product::where('id',$request->product_id)->first();
        // return $request->qty;
        ProductColor::where('id',$prod_color_id)->update([
            'quantity'=>$request->qty
        ]);
        return response()->json(['message'=>'product color quantity updated']);

}
    public function deleteprodcolor($prod_color_id){
        ProductColor::where('id',$prod_color_id)->delete();
        return response()->json(['message'=>'product color quantity deleted']);

    }

}
