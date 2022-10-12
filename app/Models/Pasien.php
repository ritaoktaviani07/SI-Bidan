<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use app\Models\Tindakan;
use app\Models\User;

class Pasien extends Model
{
  use HasFactory;
  protected $table = "pasien";
  protected $fillable = [
    'id', 'id_tindakan', 'nama_pasien', 'nik',
    'jenis_kelamin', 'umur', 'no_hp', 'alamat'
  ];

  public function users()
  {
    return $this->belongsTo(User::class, 'name');
  }
  public function tindakan()
  {
    return $this->belongsTo(Tindakan::class, 'jenis_tindakan');
  }

  public function getUser()
  {
    return $this->belongsTo(User::class, 'id');
  }
}
