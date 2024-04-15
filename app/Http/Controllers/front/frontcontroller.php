<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class frontcontroller extends Controller
{
    public function index(){
        $sliders=Slider::where('status','0')->get();
        return view('front.front',compact('sliders'));
    }
}
