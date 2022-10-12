<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Tindakan;
use App\Models\Footer;
use RealRashid\SweetAlert\Facades\Alert;


class TindakanController extends Controller
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
        $tindakan = Tindakan::select('id','jenis_tindakan')->latest()->simplePaginate(5);
        return view('admin/tindakan/index', compact('tindakan','footer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $footer = $this->footer;
        return view('admin/tindakan/create', compact('footer'));
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
            'jenis_tindakan' => 'required',
        ]);

        Tindakan::create([
            'jenis_tindakan'=> Str::title($request->jenis_tindakan),
        ]);

        Alert::success('Sukses', 'Data Berhasil Ditambahkan');
        return redirect('/tindakan');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   $footer = $this->footer;
        $tindakan = Tindakan::select('id','jenis_tindakan')->whereId($id)->first();
        return view('admin/tindakan/edit',compact('tindakan','footer'));
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
            'jenis_tindakan' => 'required',
        ]);

        Tindakan::whereId($id)->update([
            'jenis_tindakan' => Str::title($request->jenis_tindakan),
        ]);

        Alert::success('Sukses', 'Data Berhasil Diubah');
        return redirect('/tindakan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function konfirmasi($id){
        alert()->question('Peringatan!','Anda yakin akan menghapus data ?')
        ->showConfirmButton('<a href="/tindakan/' .$id. '/delete" class="text-white"
        style="text-decoration:none"> Hapus </a>', '#3085d6')->toHtml()
        ->showCancelButton('Batal','#aaa')->reverseButtons();

        return redirect('/tindakan');
    }

    public function delete($id){
        $tindakan = Tindakan::select('id','jenis_tindakan')->whereId($id)->firstOrFail();
        $tindakan->delete();

        Alert::success('Sukses', 'Data Berhasil Dihapus');
        return redirect('/tindakan');
    }
}
