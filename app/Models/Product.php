<?php

namespace App\Models;

use App\Http\Requests\productrequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded=[];
    
    public function productImages(){
        return $this->hasMany(Product_image::class,'products_id','id');
    }
    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }
    public function productcolor(){
        return $this->hasMany(ProductColor::class,'product_id','id');
    }


}

