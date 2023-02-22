<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\blog;
use App\Models\category_blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic ;
use PHPUnit\Framework\Constraint\FileExists;

class blogController extends Controller
{
    public function add_blog(){
        $data = blog::all();

        $data_category_blog = category_blog::all();

        return view('admin.add.add-blog',compact('data','data_category_blog'));
    }

    public function insert_blog(Request $request){
        $request->validate([
            'title_blog' => 'required',
            'body_blog' => 'required',
            'category_blog_id' => 'required',
            'foto' => 'required',
        ]);
        $data = blog::create($request->all());

        // $excerpt = Str::limit($request->body, 25);
        // $data->sub_body_blog = $excerpt;

        if ($request->hasFile('foto')) {
            $filename = Str::random(8) . '.' . $request->file('foto')->extension();
            $request->file('foto')->move('images/blog/',$filename);
            $data->foto = $filename;
            $data->save();
        }
        

        $data->save;
        return redirect()->route('blog')->with('success','Data Berhasil Ditambahkan');
    }

    public function edit_blog($id){
        $data = blog::find($id);

        $data_category_blog = category_blog::all();


        return view('admin.edit.edit-blog',compact('data','data_category_blog'));
    }

    public function update_blog(Request $request,$id){
        $data = blog::find($id);
        if ($request->hasFile('foto')) {
            if (File_exists(public_path('images/blog/'.$data->foto))) {
                unlink(public_path('images/blog/'.$data->foto));
            }
        }
        $data->update($request->all());

        if ($request->hasFile('foto')) {
            
            $filename = Str::random(8) . '.' . $request->file('foto')->extension();
            $request->file('foto')->move('images/blog/',$filename);
            $data->foto = $filename;
            $data->save();
        }
        return redirect()->route('blog')->with('success','Data Berhasil Diupdate');
    }

    public function delete_blog($id){
        $data = blog::find($id);

        if (File_exists(public_path('images/blog/'.$data->foto))) {
            unlink(public_path('images/blog/'.$data->foto));
        }

        $data->delete();
        return redirect()->route('blog')->with('error', 'Data Berhasil Dihapus');
    }
}
