<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rekam_Medis;
use App\Models\Ibu_Hamil;
use App\Models\Footer;
use App\Models\Ibu_Melahirkan;
use App\Models\Tindakan;
use App\Models\Pemeriksaan;
use App\Models\Pemeriksaan_Anak;
use App\Models\Pemeriksaan_Kb;
use RealRashid\SweetAlert\Facades\Alert;

// i love you fadel
class RekamMedisController extends Controller
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
    $rekam_medis = Rekam_Medis::latest()->get();
    $tindakan = Tindakan::all();
    $pemeriksaan = Pemeriksaan::all();

    return view('admin.rekam_medis.index', compact('rekam_medis', 'tindakan', 'pemeriksaan', 'footer'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $footer = $this->footer;

    $tindakan = Tindakan::select('id', 'jenis_tindakan')->get();
    return view('admin/rekam_medis/create', compact('tindakan', 'footer'));
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
      'id_tindakan' => 'required',
      'id_pemeriksaan' => 'required',
    ]);

    Rekam_Medis::create([
      'id_pasien' => $request->id_pasien,
      'id_tindakan' => $request->id_tindakan,
      'id_pemeriksaan' => $request->id_pemeriksaan
    ]);
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $rekam_medis = Rekam_Medis::findOrFail($id);
    $pemeriksaan = Pemeriksaan::all();
    $data = null;
    $v = null;
    if ($rekam_medis->id_tindakan == '1') {
      $data = Ibu_Hamil::where('id_pemeriksaan', $rekam_medis->id_pemeriksaan)->first();
      $v = 'reports.ibuhamil';
    } elseif ($rekam_medis->id_tindakan == '2') {
      $data = Ibu_Melahirkan::where('id_pemeriksaan', $rekam_medis->id_pemeriksaan)->first();
      $v = 'reports.ibumelahirkan';
    } elseif ($rekam_medis->id_tindakan == '3') {
      $data = Pemeriksaan_Kb::where('id_pemeriksaan', $rekam_medis->id_pemeriksaan)->first();
      $v = 'reports.pemeriksaankb';
    } elseif ($rekam_medis->id_tindakan == '4') {
      $data = Pemeriksaan_Anak::where('id_pemeriksaan', $rekam_medis->id_pemeriksaan)->first();
      $v = 'reports.pemeriksaananak';
    }
    return view($v, compact('data', 'pemeriksaan'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    //
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
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    //
  }
}
