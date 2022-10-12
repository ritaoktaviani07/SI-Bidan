<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\Pemeriksaan;

class Pemeriksaan_Kb extends Model
{
  use HasFactory;
  protected $table = 'pemeriksaan_kb';
  protected $fillable = ['id_pasien', 'id_pemeriksaan', 'berat_badan', 'tekanan_darah', 'kontrasepsi'];

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
