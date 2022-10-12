<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ibu_Hamil;
use App\Models\Pemeriksaan;
use App\Models\Footer;
use App\Models\Rekam_Medis;
use RealRashid\SweetAlert\Facades\Alert;


class IbuHamilController extends Controller

{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */

  public function __construct()
  {
    $this->footer = Footer::select('konten')->first();
  }

  public function index()
  {
    $footer = $this->footer;
    $ibu_hamil = Ibu_Hamil::latest()->get();
    $pemeriksaan = Pemeriksaan::all();

    return view('admin.ibu_hamil.index', compact('ibu_hamil', 'footer', 'pemeriksaan'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $footer = $this->footer;
    $pemeriksaan = Pemeriksaan::where('id_tindakan', 1)
      ->where('keterangan', 'Sedang Diperiksa')
      ->orderBy('tgl_periksa', 'ASC')
      ->get();
    return view('admin.ibu_hamil.create', compact('pemeriksaan', 'footer'));
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
      'id_pasien' => 'required',
      'id_pemeriksaan' => 'required',
      'gpah' => 'required',
      'hpl' => 'required',
      'usia_kehamilan' => 'required',
      'jarak_anak' => 'required',
      'tekanan_darah'  => 'required',
      'berat_badan'  => 'required',
      'tinggi_fungsi_uteri' => 'required',
      'letak_janin' => 'required',
      'detak_jantung_janin' => 'required',
      'taksiran_persalinan' => 'required'
    ]);

    $pemeriksaan  = Pemeriksaan::findOrFail($request->id_pemeriksaan);
    $pemeriksaan  = $pemeriksaan->update([
      'keterangan'  => 'Selesai Diperiksa',
    ]);
    $ibu_hamil = Ibu_Hamil::create($request->all());
    $rekam_medis = Rekam_Medis::create([
      'id_pasien'       => $request->id_pasien,
      'id_tindakan'     => 1,
      'id_pemeriksaan'  => $request->id_pemeriksaan,
    ]);

    if ($pemeriksaan && $ibu_hamil && $rekam_medis) {
      Alert::success('Sukses', 'Data Berhasil Ditambahkan');
      return redirect()->route('ibu_hamil.index');
    } else {
      Alert::error('Gagal', 'Data Gagal Ditambahkan');
      return redirect()->route('ibu_hamil.index');
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */

  //  TODO hapus 
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
  {
    $footer = $this->footer;
    $ibu_hamil = Ibu_Hamil::where('id', $id)->get();
    $pemeriksaan = Pemeriksaan::where('id_tindakan', 1)
      ->where('keterangan', 'Sedang Diperiksa')
      ->orderBy('tgl_periksa', 'ASC')
      ->get();
    return view('admin.ibu_hamil.edit', compact('ibu_hamil', 'pemeriksaan', 'footer'));
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
      'id_pasien' => 'required',
      'id_pemeriksaan' => 'required',
      'gpah' => 'required',
      'hpl' => 'required',
      'usia_kehamilan' => 'required',
      'jarak_anak' => 'required',
      'tekanan_darah'  => 'required',
      'berat_badan'  => 'required',
      'tinggi_fungsi_uteri' => 'required',
      'letak_janin' => 'required',
      'detak_jantung_janin' => 'required',
      'taksiran_persalinan' => 'required'
    ]);

    Ibu_Hamil::whereId($id)->update([
      'id_pasien' => $request->id_pasien,
      'id_pemeriksaan' => $request->id_pemeriksaan,
      'gpah' => $request->gpah,
      'hpl' => $request->hpl,
      'usia_kehamilan' => $request->usia_kehamilan,
      'jarak_anak' => $request->jarak_anak,
      'tekanan_darah'  => $request->tekanan_darah,
      'berat_badan'  => $request->berat_badan,
      'tinggi_fungsi_uteri' => $request->tinggi_fungsi_uteri,
      'letak_janin' => $request->letak_janin,
      'detak_jantung_janin' => $request->detak_jantung_janin,
      'taksiran_persalinan' => $request->taksiran_persalinan,
    ]);
    Alert::success('Sukses', 'Data Berhasil Diubah');
    return redirect()->route('ibu_hamil.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($ibu_hamil, Request $request)
  {
    if ($request->ajax()) {
      $ibuhamil = Ibu_Hamil::where('id', $ibu_hamil)->get();
      $pemeriksaan = Pemeriksaan::where('id', $ibuhamil->id_pemeriksaan)->get();
      if ($ibuhamil && $pemeriksaan) {
        $ibuhamil->delete();
        $pemeriksaan->delete();
        return response()->json(array('success' => true));
      }
    }
  }
}
