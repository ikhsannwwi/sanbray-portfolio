<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\blog;
use App\Models\category_blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic ;

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
            $request->file('foto')->move('images/blog/foto',$filename);
            $data->foto = $filename;
            $data->save();
        }
        if ($request->hasFile('sub_foto')) {
            $filename = Str::random(8) . '.' . $request->file('sub_foto')->extension();
            $data->sub_foto = $filename;
            $image_resize = ImageManagerStatic::make($request->file('sub_foto')->getRealPath());
            $image_resize->fit(50);
            $request->file('sub_foto')->move('images/blog/sub-foto',$filename);
            $data->sub_foto = $filename;
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

        $data->update($request->all());

        if ($request->hasFile('foto')) {
            $filename = Str::random(8).'.'.$request->file('foto')->extension();
            $request->file('foto')->move('/images/blog/foto',$filename);
            $data->foto = $filename;
            $data->save();
        }
        return redirect()->route('blog')->with('success','Data Berhasil Diupdate');
    }

    public function delete_blog($id){
        $data = blog::find($id);

        $data->delete();
        return redirect()->route('blog')->with('error', 'Data Berhasil Dihapus');
    }
}
