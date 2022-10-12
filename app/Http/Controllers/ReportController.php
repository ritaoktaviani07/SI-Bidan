<?php

namespace App\Http\Controllers;

use App\Models\Ibu_Hamil;
use App\Models\Ibu_Melahirkan;
use App\Models\Pemeriksaan;
use App\Models\Pemeriksaan_Anak;
use App\Models\Pemeriksaan_Kb;
use App\Models\Rekam_Medis;
use App\Models\Tindakan;
use Illuminate\Http\Request;

class ReportController extends Controller
{
  public function allPemeriksaan()
  {
    $pemeriksaan = Pemeriksaan::all();
    $tindakan = Tindakan::all();
    return view('reports.pemeriksaan', compact('pemeriksaan', 'tindakan'));
  }

  public function pemeriksaan(Request $request)
  {
    $tglmulai = str_replace('/', '-', explode(" - ", $request->rangetanggal)[0]);
    $tglselesai = str_replace('/', '-', explode(" - ", $request->rangetanggal)[1]);
    $from = date("Y-m-d", strtotime($tglmulai));
    $to = date("Y-m-d", strtotime($tglselesai));
    $pemeriksaan = Pemeriksaan::whereBetween('tgl_periksa', [$from, $to])->get();
    $tindakan = Tindakan::all();
    return view('reports.pemeriksaan', compact('pemeriksaan', 'tindakan'));
  }

  public function ibuhamil($pemeriksaanid = null, $pasienid = null)
  {
    $data = [$pemeriksaanid, $pasienid];
    dd($data);
  }

  public function rekammedisById($id)
  {
    $rekam_medis = Rekam_Medis::findOrFail($id);
    $pemeriksaan = Pemeriksaan::all();
    $data = null;
    $v = null;
    if ($rekam_medis->id_tindakan == '1') {
      $data = Ibu_Hamil::where('id_pemeriksaan', $rekam_medis->id_pemeriksaan)->first();
      $v = 'reports.ibuhamil_one';
    } elseif ($rekam_medis->id_tindakan == '2') {
      $data = Ibu_Melahirkan::where('id_pemeriksaan', $rekam_medis->id_pemeriksaan)->first();
      $v = 'reports.ibumelahirkan_one';
    } elseif ($rekam_medis->id_tindakan == '3') {
      $data = Pemeriksaan_Kb::where('id_pemeriksaan', $rekam_medis->id_pemeriksaan)->first();
      $v = 'reports.pemeriksaankb_one';
    } elseif ($rekam_medis->id_tindakan == '4') {
      $data = Pemeriksaan_Anak::where('id_pemeriksaan', $rekam_medis->id_pemeriksaan)->first();
      $v = 'reports.pemeriksaananak_one';
    }
    return view($v, compact('data', 'pemeriksaan'));
  }

  public function pemeriksaanById($id)
  {
    $pemeriksaan = Pemeriksaan::findOrFail($id);
    $data = null;
    $v = null;
    if ($pemeriksaan->id_tindakan == '1') {
      $data = Ibu_Hamil::where('id_pemeriksaan', $pemeriksaan->id)->first();
      $v = 'reports.ibuhamil_one';
    } elseif ($pemeriksaan->id_tindakan == '2') {
      $data = Ibu_Melahirkan::where('id_pemeriksaan', $pemeriksaan->id)->first();
      $v = 'reports.ibumelahirkan_one';
    } elseif ($pemeriksaan->id_tindakan == '3') {
      $data = Pemeriksaan_Kb::where('id_pemeriksaan', $pemeriksaan->id)->first();
      $v = 'reports.pemeriksaankb_one';
    } elseif ($pemeriksaan->id_tindakan == '4') {
      $data = Pemeriksaan_Anak::where('id_pemeriksaan', $pemeriksaan->id)->first();
      $v = 'reports.pemeriksaananak_one';
    }
    return view($v, compact('data', 'pemeriksaan'));
  }
}
