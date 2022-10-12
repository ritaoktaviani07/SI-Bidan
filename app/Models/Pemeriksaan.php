<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\Tindakan;

class Pemeriksaan extends Model
{
  use HasFactory;
  protected $table = "pemeriksaan";
  protected $fillable = ['id', 'id_pasien', 'id_tindakan', 'tgl_periksa', 'keterangan'];

  public function tindakan()
  {
    return $this->belongsTo(Tindakan::class, 'id_tindakan');
  }

  // one to many 
  public function pasien()
  {
    return $this->belongsTo(Pasien::class, 'id_pasien');
  }

  public function pemeriksaan()
  {
    return $this->hasMany(Pemeriksaan::class);
  }
  public function ibu_hamil()
  {
    return $this->hasOne(Ibu_Hamil::class);
  }
  public function ibu_melahirkan()
  {
    return $this->hasOne(Ibu_Melahirkan::class);
  }
  public function pemeriksaan_kb()
  {
    return $this->hasOne(Pemeriksaan_Kb::class);
  }
  public function pemeriksaan_anak()
  {
    return $this->hasOne(Pemeriksaan_Anak::class);
  }
}
