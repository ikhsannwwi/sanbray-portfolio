<?php

namespace App\Http\Controllers;

use App\Models\banner;
use App\Models\blog;
use App\Models\category_project;
use App\Models\category_blog;
use App\Models\comment_blog;
use App\Models\comment_project;
use App\Models\gallery_project;
use Illuminate\Http\Request;

class landingController extends Controller
{
    public function index(){
        $banner = banner::orderBy('created_at','DESC')->limit(2)->get();

        $project = gallery_project::inRandomOrder()->limit(8)->get();
        $nav = gallery_project::all();
        
        return view('landing.main',compact(
            'banner',
            'project',
            'nav',
        ));
    }

    public function project_detail($slug){
        $data = gallery_project::where('slug',$slug)->with('comment_project')->first();
        $comment = gallery_project::with('comment_project')->get();
        // dd($comment);
        $data_category = category_project::all();


        $nav = gallery_project::all();
        return view('landing.project-detail',compact(
            'data',
            'nav',
            'comment',
            'data_category',
        ));
    }

    public function insert_comment_project_detail(Request $request,$slug ){
        $dataa = gallery_project::where('slug',$slug)->firstOrFail();
        
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'project_id' => 'required',
            'comment' => 'required',
        ]);
        $data = comment_project::create($request->all());

        $data->save();
        return redirect()->route('project_detail',$dataa->slug)->with('success', 'Data Berhasil Ditambakan');
    }

    public function project(){
        $data = gallery_project::orderBy('created_at','DESC')->with('comment_project')->get();

        $data_category = category_project::all();

        $nav = gallery_project::all();
        
        return view('landing.project',compact(
            'data',
            'nav',
            'data_category',
        ));
    }
    
    public function project_category($slug){
        $data = gallery_project::with('category_project')->get();

        // dd($data);
        
        $data_category = category_project::all();
        
        $nav = category_project::all();
        return view('landing.project',compact(
            'data',
            'nav',
            'data_category',
        ));
    }
    
    
    
    
    public function blog_detail($slug){
        $data = blog::where('slug',$slug)->with('comment_blog')->first();
        $comment = blog::with('comment_blog')->get();
        // dd($comment);
        $data_category = category_blog::all();


        $nav = blog::all();
        return view('landing.blog-detail',compact(
            'data',
            'nav',
            'comment',
            'data_category',
        ));
    }

    public function insert_comment_blog_detail(Request $request,$slug ){
        $dataa = blog::where('slug',$slug)->firstOrFail();
        
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'blog_id' => 'required',
            'comment' => 'required',
        ]);
        $data = comment_blog::create($request->all());

        $data->save();
        return redirect()->route('blog_detail',$dataa->slug)->with('success', 'Data Berhasil Ditambakan');
    }

    public function blog_index(){
        $data = blog::orderBy('created_at','DESC')->with('comment_blog')->get();

        $data_category = category_blog::all();

        $nav = blog::all();
        
        return view('landing.blog',compact(
            'data',
            'nav',
            'data_category',
        ));
    }
    
    public function blog_category($slug){
        $data = blog::with('category_blog')->get();

        // dd($data);
        
        $data_category = category_blog::all();
        
        $nav = category_blog::all();
        return view('landing.blog',compact(
            'data',
            'nav',
            'data_category',
        ));
    }
}
