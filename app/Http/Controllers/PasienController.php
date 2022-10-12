<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Pasien;
use App\Models\Tindakan;
use App\Models\Footer;
use RealRashid\SweetAlert\Facades\Alert;


class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->footer = Footer::select('konten')->first();
    }

    public function index()
    {
        $footer = $this->footer;

        $pasien = Pasien::select('id','id_tindakan','nama_pasien',
        'nik','jenis_kelamin','umur','no_hp','alamat')->latest()->simplePaginate(5);

        return view('admin/pasien/index', compact('pasien','footer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $footer = $this->footer;

        $tindakan = Tindakan::select('id','jenis_tindakan')->get();
        return view('admin/pasien/create' , compact('tindakan','footer'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_tindakan' => 'required',
            'nama_pasien' => 'required',
            'nik' => 'required',
            'jenis_kelamin' => 'required',
            'umur' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
        ]);

        Pasien::create([
            'id_tindakan'=> $request-> id_tindakan ,
            'nama_pasien'=> Str::title($request-> nama_pasien),
            'nik'=> $request-> nik,
            'jenis_kelamin'=> $request-> jenis_kelamin,
            'umur'=> $request-> umur,
            'no_hp'=> $request-> no_hp,
            'alamat'=> $request-> alamat,
        ]);

        Alert::success('Sukses', 'Data Berhasil Ditambahkan');
        return redirect('/pemeriksaan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $footer = $this->footer;
        $pasien = Pasien::select('id','id_tindakan','nama_pasien','nik','jenis_kelamin',
        'umur','no_hp','alamat')->whereId($id)->firstOrFail();
        return view('admin/pasien/show', compact('pasien','footer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $footer = $this->footer;

        $pasien = Pasien::select('id','id_tindakan','nama_pasien','nik','jenis_kelamin','umur','no_hp','alamat')->whereId($id)->first();
        return view('admin/pasien/edit',compact('pasien','footer'));

        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $request->validate([
            'id_tindakan' => 'required',
            'nama_pasien' => 'required',
            'nik' => 'required',
            'jenis_kelamin' => 'required',
            'umur' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required'
        ]);

        Pasien::whereId($id)->update([
            'id_tindakan'=> $request-> id_tindakan ,
            'nama_pasien'=> Str::title($request-> nama_pasien),
            'nik'=> $request-> nik,
            'jenis_kelamin'=> $request-> jenis_kelamin,
            'umur'=> $request-> umur,
            'no_hp'=> $request-> no_hp,
            'alamat'=> $request-> alamat
        ]);

        Alert::success('Sukses', 'Data Berhasil Diubah');
        return redirect('/pasien');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function konfirmasi($id){
        alert()->question('Peringatan!','Anda yakin akan menghapus data ?')
        ->showConfirmButton('<a href="/pasien/' .$id. '/delete" class="text-white"
        style="text-decoration:none"> Hapus </a>', '#3085d6')->toHtml()
        ->showCancelButton('Batal','#aaa')->reverseButtons();

        return redirect('/pasien');
    }

    public function delete($id){
        Pasien::whereId($id)->delete();

        Alert::success('Sukses', 'Data Berhasil Dihapus');
        return redirect('/pasien');
    }
}

