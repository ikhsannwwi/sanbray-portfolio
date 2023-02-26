<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\cv;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class cvController extends Controller
{
    public function cvDownload(){
        $data = cv::all();

        foreach ($data as $row) {
            return response()->download(public_path('images/cv/'.$row->cv));
            # code...
        }

        return redirect('index')->with('success','File CV telah didownload');
    }

    public function add_cv()
    {
        $data = cv::all();
        // dd($data);

        return view('admin.add.add-cv',compact('data'));
    }
    public function insert_cv(Request $request){
        $request->validate([
            'cv' => 'required',
        ]);
        $data = cv::create($request->all());

        if ($request->hasFile('cv')) {
            $filename = 'Mochammad Ikhsan Nawawi - CV.' . $request->file('cv')->extension();
            $request->file('cv')->move('images/cv', $filename);
            $data->cv = $filename;
            $data->save();
        }

        return redirect()->route('cv')->with('success', 'Data Berhasil Ditambahkan');
    }
    public function edit_cv($id)
    {
        $data = cv::find($id);

        return view('admin.edit.edit-cv' ,compact('data'));
    }

    public function update_cv(Request $request, $id){
        $data = cv::find($id);
        if ($request->hasFile('cv')) {
            # code...
            if (File_exists(public_path('images/cv/' . $data->cv))) { //either you can use file path instead of $data->image
                unlink(public_path('images/cv/' . $data->cv)); //here you can also use path like as ('uploads/media/welcome/'. $data->image)
            }
        }
        $data->update($request->all());
        if ($request->hasFile('cv')) {
            $filename = 'Mochammad Ikhsan Nawawi - CV.' . $request->file('cv')->extension();
            $request->file('cv')->move('images/cv', $filename);
            $data->cv = $filename;
            $data->save();
        }

        return redirect()->route('cv')->with('success', 'Data Berhasil Diupdate');
    }

    public function delete_cv($id){
        $data = cv::find($id);

        if (File_exists(public_path('images/cv/' . $data->cv))) { //either you can use file path instead of $data->image
            unlink(public_path('images/cv/' . $data->cv)); //here you can also use path like as ('uploads/media/welcome/'. $data->image)
        }
        
        $data->delete();
        return redirect()->route('cv')->with('error', 'Data Berhasil Dihapus');
    }
}
