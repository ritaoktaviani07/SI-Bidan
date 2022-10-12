<?php

namespace App\Http\Controllers;

use App\Models\Pemeriksaan;
use Illuminate\Http\Request;

class SOptionController extends Controller
{
  public function getPemeriksaanById($id)
  {
    $pemeriksaan =  Pemeriksaan::select('pemeriksaan.id', 'pemeriksaan.id_pasien', 'pasien.nama_pasien', 'pemeriksaan.tgl_periksa')
      ->join('pasien', 'pemeriksaan.id_pasien', '=', 'pasien.id')
      ->where('pemeriksaan.id', $id)
      ->get();
    return response()->json($pemeriksaan);
  }
}
