<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ibu_Melahirkan;
use App\Models\Footer;
use App\Models\Pemeriksaan;
use App\Models\Rekam_Medis;
use RealRashid\SweetAlert\Facades\Alert;


class IbuMelahirkanController extends Controller
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
    $ibu_melahirkan = Ibu_Melahirkan::latest()->get();
    $pemeriksaan = Pemeriksaan::all();

    return view('admin.ibu_melahirkan.index', compact('ibu_melahirkan', 'footer', 'pemeriksaan'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $footer = $this->footer;
    $pemeriksaan = Pemeriksaan::where('id_tindakan', 2)
      ->where('keterangan', 'Sedang Diperiksa')
      ->orderBy('tgl_periksa', 'ASC')
      ->get();
    return view('admin.ibu_melahirkan.create', compact('pemeriksaan', 'footer'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $footer = $this->footer;
    $request->validate([
      'id_pasien' => 'required',
      'id_pemeriksaan' => 'required',
      'nama_anak'       => 'required',
      'tgl_melahirkan' => 'required',
      'jekel_anak' => 'required',
      'berat_anak' => 'required',
      'tinggi_anak' => 'required'
    ]);
    $pemeriksaan  = Pemeriksaan::findOrFail($request->id_pemeriksaan);
    $pemeriksaan  = $pemeriksaan->update([
      'keterangan'  => 'Selesai Diperiksa',
    ]);
    $ibu_melahirkan = Ibu_Melahirkan::create($request->all());
    $rekam_medis = Rekam_Medis::create([
      'id_pasien'       => $request->id_pasien,
      'id_tindakan'     => 2,
      'id_pemeriksaan'  => $request->id_pemeriksaan,
    ]);

    if ($pemeriksaan && $ibu_melahirkan && $rekam_medis) {
      Alert::success('Sukses', 'Data Berhasil Ditambahkan');
      return redirect()->route('ibu_melahirkan.index');
    } else {
      Alert::error('Gagal', 'Data Gagal Ditambahkan');
      return redirect()->route('ibu_melahirkan.index');
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
    $ibu_melahirkan = Ibu_Melahirkan::where('id', $id)->get();
    $pemeriksaan = Pemeriksaan::where('id_tindakan', 2)
      ->where('keterangan', 'Sedang Diperiksa')
      ->orderBy('tgl_periksa', 'ASC')
      ->get();
    return view('admin.ibu_melahirkan.edit', compact('ibu_melahirkan', 'pemeriksaan', 'footer'));
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
      'nama_anak'       => 'required',
      'tgl_melahirkan' => 'required',
      'jekel_anak' => 'required',
      'berat_anak' => 'required',
      'tinggi_anak' => 'required'
    ]);

    Ibu_Melahirkan::whereId($id)->update([
      'id_pasien' =>  $request->id_pasien,
      'id_pemeriksaan' =>  $request->id_pemeriksaan,
      'nama_anak'     => $request->nama_anak,
      'tgl_melahirkan' =>  $request->tgl_melahirkan,
      'jekel_anak' =>  $request->jekel_anak,
      'berat_anak' =>  $request->berat_anak,
      'tinggi_anak' =>  $request->tinggi_anak
    ]);

    Alert::success('Sukses', 'Data Berhasil Diubah');

    return redirect()->route('ibu_melahirkan.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($ibu_melahirkan, Request $request)
  {
    if ($request->ajax()) {
      $ibumelahirkan = Ibu_Melahirkan::where('id', $ibu_melahirkan)->get();
      $pemeriksaan = Pemeriksaan::where('id', $ibumelahirkan->id_pemeriksaan)->get();
      if ($ibumelahirkan && $pemeriksaan) {
        $ibumelahirkan->delete();
        $pemeriksaan->delete();
        return response()->json(array('success' => true));
      }
    }
  }
}
