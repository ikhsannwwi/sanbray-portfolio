<?php

namespace App\Http\Controllers;

use App\Models\banner;
use App\Models\gallery_project;
use Illuminate\Http\Request;

class landingController extends Controller
{
    public function index(){
        $banner = banner::orderBy('created_at','DESC')->limit(2)->get();

        $project = gallery_project::inRandomOrder()->limit(8)->get();
        return view('landing.main',compact(
            'banner',
            'project',
        ));
    }

    public function project_detail($slug){
        $data = gallery_project::where('slug',$slug)->first();
        return view('landing.project-detail',compact(
            'data',
        ));
    }

    public function project(){
        $data = gallery_project::orderBy('created_at','DESC')->get();
        return view('landing.project',compact(
            'data',
        ));
    }
}
