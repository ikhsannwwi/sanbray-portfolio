<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class blogController extends Controller
{
    public function add_blog(){
        $data = blog::all();

        return view('admin.add.add-blog',compact('data'));
    }

    public function insert_blog(Request $request){
        $data = blog::create($request->all());

        if ($request->hasFile('foto')) {
            $filename = Str::random(8) . '.' . $request->file('foto')->extension();
            $request->file('foto')->move('images/blog/foto',$filename);
            $data->foto = $filename;
            $data->save();
        }

        $data->save;
        return redirect()->route('blog')->with('success','Data Berhasil Ditambahkan');
    }
}
