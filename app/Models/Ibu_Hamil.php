<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\Pemeriksaan;

class Ibu_Hamil extends Model
{
  use HasFactory;
  protected $table = 'ibu_hamil';
  protected $fillable = [
    'id_pasien', 'id_pemeriksaan', 'gpah', 'hpl', 'usia_kehamilan', 'jarak_anak', 'tekanan_darah', 'berat_badan', 'tinggi_fungsi_uteri', 'letak_janin',
    'detak_jantung_janin', 'taksiran_persalinan'
  ];

  // Relasi Tabel
  public function pemeriksaan()
  {
    return $this->belongsTo(Pemeriksaan::class, 'id_pemeriksaan');
  }

  public function pasien()
  {
    return $this->belongsTo(Pasien::class, 'id_pasien');
  }
}
