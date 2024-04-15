<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\CategoryController;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    //  function FunctionName()  {
    //     $ss=new CategoryController;
    //  }

     
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
}
