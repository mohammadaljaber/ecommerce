<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class dashbordcontroller extends Controller
{
    public function index() {
        return view('admin.dashbord');
    }
     public function create() {
        return view('admin.categore.create');
     }
}
