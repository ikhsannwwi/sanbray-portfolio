<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class viewController extends Controller
{
    public function administrator(){
        return view('admin.data.dashboard');
    }
    public function banner(){
        return view('admin.data.banner');
    }
    public function blog(){
        return view('admin.data.blog');
    }
    public function gallery_project(){
        return view('admin.data.gallery-project');
    }
    public function testimoni(){
        return view('admin.data.testimoni');
    }
}
