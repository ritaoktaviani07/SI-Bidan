<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemeriksaan_Anak;
use App\Models\Footer;
use App\Models\pemeriksaan;
use App\Models\Rekam_Medis;
use RealRashid\SweetAlert\Facades\Alert;


class PemeriksaanAnakController extends Controller
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
    $pemeriksaan_anak = Pemeriksaan_Anak::latest()->get();
    $pemeriksaan = Pemeriksaan::all();

    return view('admin.pemeriksaan_anak.index', compact('pemeriksaan_anak', 'footer', 'pemeriksaan'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $footer = $this->footer;
    $pemeriksaan = Pemeriksaan::where('id_tindakan', 4)
      ->where('keterangan', 'Sedang Diperiksa')
      ->orderBy('tgl_periksa', 'ASC')
      ->get();
    return view('admin.pemeriksaan_anak.create', compact('pemeriksaan', 'footer'));
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
      'nama_ibu' => 'required',
      'tgl_lahir' => 'required',
      'bcg' => 'required',
      'dpt' => 'required',
      'polio' => 'required',
      'ipv' => 'required',
      'campak' => 'required',
      'tetanus' => 'required'
    ]);
    $pemeriksaan  = Pemeriksaan::findOrFail($request->id_pemeriksaan);
    $pemeriksaan  = $pemeriksaan->update([
      'keterangan'  => 'Selesai Diperiksa',
    ]);
    $pemeriksaan_anak = Pemeriksaan_Anak::create($request->all());
    $rekam_medis = Rekam_Medis::create([
      'id_pasien'       => $request->id_pasien,
      'id_tindakan'     => 4,
      'id_pemeriksaan'  => $request->id_pemeriksaan,
    ]);

    if ($pemeriksaan && $pemeriksaan_anak && $rekam_medis) {
      Alert::success('Sukses', 'Data Berhasil Ditambahkan');
      return redirect()->route('pemeriksaan_anak.index');
    } else {
      Alert::error('Gagal', 'Data Gagal Ditambahkan');
      return redirect()->route('pemeriksaan_anak.index');
    }
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
  {
    $footer = $this->footer;
    $pemeriksaan_anak = Pemeriksaan_Anak::findOrFail($id)->first();
    $pemeriksaan = Pemeriksaan::where('id_tindakan', 4)
      ->where('keterangan', 'Sedang Diperiksa')
      ->orderBy('tgl_periksa', 'ASC')
      ->get();
    return view('admin.pemeriksaan_anak.edit', compact('pemeriksaan_anak', 'pemeriksaan', 'footer'));
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
      'nama_ibu' => 'required',
      'tgl_lahir' => 'required',
      'bcg' => 'required',
      'dpt' => 'required',
      'polio' => 'required',
      'ipv' => 'required',
      'campak' => 'required',
      'tetanus' => 'required'
    ]);

    Pemeriksaan_Anak::whereId($id)->update([
      'id_pasien' => $request->id_pasien,
      'id_pemeriksaan' => $request->id_pemeriksaan,
      'nama_ibu' => $request->nama_ibu,
      'tgl_lahir' =>  $request->tgl_lahir,
      'bcg' =>  $request->bcg,
      'dpt' =>  $request->dpt,
      'polio' =>  $request->polio,
      'ipv' =>  $request->ipv,
      'campak' =>  $request->campak,
      'tetanus' =>  $request->tetanus
    ]);

    Alert::success('Sukses', 'Data Berhasil Diubah');
    return redirect()->route('pemeriksaan_anak.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($pemeriksaan_anak, Request $request)
  {
    if ($request->ajax()) {
      $pemeriksaananak = Pemeriksaan_Anak::where('id', $pemeriksaan_anak)->get();
      $pemeriksaan = Pemeriksaan::where('id', $pemeriksaananak->id_pemeriksaan)->get();
      if ($pemeriksaananak && $pemeriksaan) {
        $pemeriksaananak->delete();
        $pemeriksaan->delete();
        return response()->json(array('success' => true));
      }
    }
  }
}
