<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Footer;
use RealRashid\SweetAlert\Facades\Alert;

class FooterController extends Controller
{
    public function __construct(){
        $this->footer = Footer::select('konten')->first();
    }

    public function index(){
        $footer = $this->footer;
        
        $footer = Footer::select('id','konten')->first();
        return view('admin/footer/index',compact('footer'));
    }
    public function update(Request $request, $id) {
        $request->validate([
            'konten' => 'required',
        ]);

        Footer::whereId($id)->update([
            'konten' => $request->konten
        ]);

        Alert::success('Sukses', 'Data Berhasil Diubah');
        return redirect('/footer');
    }
}
