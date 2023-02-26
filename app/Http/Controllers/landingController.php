<?php

namespace App\Http\Controllers;

use App\Models\banner;
use App\Models\blog;
use App\Models\category_project;
use App\Models\category_blog;
use App\Models\comment_blog;
use App\Models\comment_project;
use App\Models\gallery_project;
use App\Models\testimoni;
use Illuminate\Http\Request;

class landingController extends Controller
{
    public function index(){
        $banner = banner::orderBy('created_at','DESC')->limit(2)->get();
        $testimoni = testimoni::inRandomOrder()->get();
        $project = gallery_project::inRandomOrder()->limit(8)->get();
        $blog = blog::inRandomOrder()->limit(3)->get();
        $nav = gallery_project::all();
        $comment_blog_count = comment_blog::all();
        $blog_count = blog::all();
        $testimoni_count = testimoni::all();
        
        return view('landing.main',compact(
            'banner',
            'project',
            'blog',
            'testimoni',
            'nav',
            'comment_blog_count',
            'blog_count',
            'testimoni_count',
        ));
    }

    public function project_detail($slug){
        $data = gallery_project::where('slug',$slug)->with('comment_project')->first();
        $comment = gallery_project::with('comment_project')->get();
        // dd($comment);
        $data_category = category_project::all();
        $recent_project = gallery_project::inRandomOrder()->limit(3)->get();

        $nav = gallery_project::all();
        return view('landing.project-detail',compact(
            'data',
            'nav',
            'comment',
            'data_category',
            'recent_project',
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
        $recent_project = gallery_project::inRandomOrder()->limit(3)->get();
        
        return view('landing.project',compact(
            'data',
            'nav',
            'data_category',
            'recent_project',
        ));
    }
    
    public function project_category($slug){
        $data = category_project::where('slug',$slug)->with('gallery_project')->firstOrFail();

        // dd($data);
        
        $data_category = category_project::all();

        $recent_project = gallery_project::inRandomOrder()->limit(3)->get();

        
        $nav = category_project::all();
        return view('landing.project-category',compact(
            'data',
            'nav',
            'data_category',
            'recent_project',
        ));
    }
    
    
    
    
    public function blog_detail($slug){
        $data = blog::where('slug',$slug)->with('comment_blog')->with('category_blog')->firstOrFail();
        $comment = blog::with('comment_blog')->get();
        // dd($comment);
        $data_category_with_blog = category_blog::with('blog')->get();
        $recent_blog = blog::inRandomOrder()->limit(3)->get();
        $data_category = category_blog::all();


        $nav = blog::all();
        return view('landing.blog-detail',compact(
            'data',
            'nav',
            'comment',
            'data_category',
            'data_category_with_blog',
            'recent_blog',
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

        $recent_blog = blog::inRandomOrder()->limit(3)->get();

        $nav = blog::all();
        
        return view('landing.blog',compact(
            'data',
            'nav',
            'data_category',
            'recent_blog',
        ));
    }
    
    public function blog_category($slug){
        $data = category_blog::where('slug',$slug)->with('blog')->firstOrFail();

        // dd($data);
        
        $data_category = category_blog::all();

        $recent_blog = blog::inRandomOrder()->limit(3)->get();

        
        $nav = category_blog::all();
        return view('landing.blog-category',compact(
            'data',
            'nav',
            'data_category',
            'recent_blog',
        ));
    }
}
