<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemeriksaan_Kb;
use App\Models\Pemeriksaan;
use App\Models\Footer;
use App\Models\Rekam_Medis;
use RealRashid\SweetAlert\Facades\Alert;


class PemeriksaanKbController extends Controller
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
    $pemeriksaan_kb = Pemeriksaan_Kb::latest()->get();
    $pemeriksaan = Pemeriksaan::all();

    return view('admin.pemeriksaan_kb.index', compact('pemeriksaan_kb', 'footer', 'pemeriksaan'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $footer = $this->footer;
    $pemeriksaan = Pemeriksaan::where('id_tindakan', 3)
      ->where('keterangan', 'Sedang Diperiksa')
      ->orderBy('tgl_periksa', 'ASC')
      ->get();
    return view('admin.pemeriksaan_kb.create', compact('pemeriksaan', 'footer'));
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
      'berat_badan' => 'required',
      'tekanan_darah' => 'required',
      'kontrasepsi' => 'required'
    ]);
    $pemeriksaan  = Pemeriksaan::findOrFail($request->id_pemeriksaan);
    $pemeriksaan  = $pemeriksaan->update([
      'keterangan'  => 'Selesai Diperiksa',
    ]);
    $pemeriksaan_kb = Pemeriksaan_Kb::create($request->all());
    $rekam_medis = Rekam_Medis::create([
      'id_pasien'       => $request->id_pasien,
      'id_tindakan'     => 3,
      'id_pemeriksaan'  => $request->id_pemeriksaan,
    ]);

    if ($pemeriksaan && $pemeriksaan_kb && $rekam_medis) {
      Alert::success('Sukses', 'Data Berhasil Ditambahkan');
      return redirect()->route('pemeriksaan_kb.index');
    } else {
      Alert::error('Gagal', 'Data Gagal Ditambahkan');
      return redirect()->route('pemeriksaan_kb.index');
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
    $pemeriksaan_kb = Pemeriksaan_Kb::where('id', $id)->get();
    $pemeriksaan = Pemeriksaan::where('id_tindakan', 3)
      ->where('keterangan', 'Sedang Diperiksa')
      ->orderBy('tgl_periksa', 'ASC')
      ->get();
    return view('admin.pemeriksaan_kb.edit', compact('pemeriksaan_kb', 'pemeriksaan', 'footer'));
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
      'berat_badan' => 'required',
      'tekanan_darah' => 'required',
      'kontrasepsi' => 'required'
    ]);

    Pemeriksaan_Kb::whereId($id)->update([
      'id_pasien' => $request->id_pasien,
      'id_pemeriksaan' => $request->id_pemeriksaan,
      'berat_badan' => $request->berat_badan,
      'tekanan_darah' => $request->tekanan_darah,
      'kontrasepsi' => $request->kontrasepsi
    ]);

    Alert::success('Sukses', 'Data Berhasil Diubah');
    return redirect()->route('pemeriksaan_kb.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($pemeriksaan_kb, Request $request)
  {
    if ($request->ajax()) {
      $pemeriksaankb = Pemeriksaan_Kb::where('id', $pemeriksaan_kb)->get();
      $pemeriksaan = Pemeriksaan::where('id', $pemeriksaankb->id_pemeriksaan)->get();
      if ($pemeriksaankb && $pemeriksaan) {
        $pemeriksaankb->delete();
        $pemeriksaan->delete();
        return response()->json(array('success' => true));
      }
    }
  }
}
