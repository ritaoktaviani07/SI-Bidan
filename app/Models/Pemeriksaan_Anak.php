<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\Pemeriksaan;

class Pemeriksaan_Anak extends Model
{
  use HasFactory;
  protected $table = 'pemeriksaan_anak';
  protected $fillable = [
    'id_pasien', 'id_pemeriksaan', 'nama_ibu', 'tgl_lahir',
    'bcg', 'dpt', 'polio', 'ipv', 'campak', 'tetanus'
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
