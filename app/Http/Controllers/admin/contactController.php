<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\contact;
use Illuminate\Http\Request;

class contactController extends Controller
{
    public function read(Request $request,$id){
        $data = contact::find($id);

        $data->update($request->all());
        $data->save();

        return redirect()->route('contact_us')->with('success','Pesan dari ' . $data->email . ' telah dibaca');
    }

    public function storeMessage(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);
        $data = contact::create($request->all());

        $data->save();

        return redirect()->route('index')->with('success','Terima kasih, Kami akan segera menghubungi Anda');
    }
}
