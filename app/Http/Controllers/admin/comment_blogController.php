<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\blog;
use App\Models\comment_blog;
use Illuminate\Http\Request;

class comment_blogController extends Controller
{
    public function add_comment_blog(){
        $data = comment_blog::all();

        $data_blog = blog::all();

        return view('admin.add.add-comment-blog' , compact('data','data_blog'));
    }

    public function insert_comment_blog(Request $request){
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'blog_id' => 'required',
            'comment' => 'required',
        ]);
        $data = comment_blog::create($request->all());

        $data->save();
        return redirect()->route('comment_blog')->with('success', 'Data Berhasil Ditambakan');
    }

    public function edit_comment_blog($id){
        $data = comment_blog::find($id);

        $data_blog = blog::all();

        return view('admin.edit.edit-comment-blog',compact(
            'data',
            'data_blog',
        ));
    }

    public function update_comment_blog(Request $request,$id){
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'blog_id' => 'required',
            'comment' => 'required',
        ]);

        $data = comment_blog::find($id);

        $data->update($request->all());

        $data->save();

        return redirect()->route('comment_blog')->with('success','Data Berhasil Diupdate');
    }

    public function delete_comment_blog($id){
        $data = comment_blog::find($id);

        $data->delete();

        return redirect()->route('comment_blog')->with('error','Data Berhasil Dihapus');
    }
}
