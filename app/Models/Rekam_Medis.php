<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\Tindakan;
use app\Models\Pemeriksaan;

class Rekam_Medis extends Model
{
  use HasFactory;
  protected $table = 'rekam_medis';
  protected $fillable = ['id_pasien', 'id_tindakan', 'id_pemeriksaan'];

  // Relasi Tabel
  public function tindakan()
  {
    return $this->belongsTo(Tindakan::class, 'id_tindakan');
  }
  public function pemeriksaan()
  {
    return $this->belongsTo(Pemeriksaan::class, 'id_pemeriksaan');
  }
  public function pasien()
  {
    return $this->belongsTo(Pasien::class, 'id_pasien');
  }
}
