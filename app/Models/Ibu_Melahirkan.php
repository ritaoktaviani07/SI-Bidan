<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\Pemeriksaan;

class Ibu_Melahirkan extends Model
{
  use HasFactory;
  protected $table = 'ibu_melahirkan';
  protected $fillable = [
    'id_pasien', 'id_pemeriksaan', 'nama_anak', 'tgl_melahirkan',
    'jekel_anak', 'berat_anak', 'tinggi_anak'
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
