<?php

namespace App\Http\Controllers;

use App\Models\Ibu_Hamil;
use App\Models\Ibu_Melahirkan;
use App\Models\Pasien;
use App\Models\Pemeriksaan;
use App\Models\Pemeriksaan_Anak;
use App\Models\Pemeriksaan_Kb;
use App\Models\Tindakan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class VisitorController extends Controller
{
  public function __construct()
  {
    $this->middleware(['verified', 'role:pengunjung']);
  }

  public function index()
  {
    $title_page = "Dashboard";
    return view('visitor.index', compact('title_page'));
  }

  public function profile()
  {
    $title_page = "Profile";
    return view('visitor.profile', compact('title_page'));
  }

  public function updateProfile(Request $request)
  {
    $this->validate($request, [
      'iduser'        => 'required',
      'nik'           => 'required|numeric',
      'nama_pasien'   => 'required',
      'no_hp'         => 'required|numeric',
      'umur'          => 'required|numeric',
      'jenis_kelamin' => 'required',
      'alamat'        => 'required',
    ]);

    //get data by ID
    $profile  = Pasien::findOrFail($request->iduser);
    $profile  = $profile->update(Arr::except($request->all(), ['iduser']));
    $user     = User::findOrFail($request->iduser);
    $user     = $user->update([
      'name'  => $request->nama_pasien,
    ]);

    if ($profile && $user) {
      Alert::success('Sukses', 'Berhasil Update Profile Anda');
      return redirect()->route('visitor.mprofile');
    } else {
      Alert::error('Gagal', 'Gagal Update Profile Anda');
      return redirect()->route('visitor.mprofile');
    }
  }

  public function registrasi()
  {
    $title_page = "Registrasi";
    $pemeriksaan = Pemeriksaan::where('id_pasien', Auth::user()->id)
      ->where('keterangan', '!=', 'Selesai Diperiksa')
      ->orderBy('tgl_periksa', 'DESC')
      ->get();
    $tindakan = Tindakan::all();
    return view('visitor.registrasi', compact('title_page', 'tindakan', 'pemeriksaan'));
  }

  public function registering(Request $request)
  {
    $this->validate($request, [
      'id_pasien'     => 'required|numeric',
      'id_tindakan'   => 'required|numeric',
      'tgl_periksa'   => 'required|date',
      'keterangan'    => 'required',
    ]);

    $pemeriksaan = Pemeriksaan::create($request->all());

    if ($pemeriksaan) {
      Alert::success('Sukses', 'Anda berhasil mendaftarkan pemeriksaan');
      return redirect()->route('visitor.mregistrasi');
    } else {
      Alert::error('Gagal', 'Anda gagal mendaftarkan pemeriksaan');
      return redirect()->route('visitor.mregistrasi');
    }
  }

  public function report()
  {
    $title_page = "Hasil Pemeriksaan";
    $pemeriksaan = Pemeriksaan::where('id_pasien', Auth::user()->id)
      ->orderBy('tgl_periksa', 'DESC')
      ->get();
    $tindakan = Tindakan::all();
    return view('visitor.hasil', compact('title_page', 'tindakan', 'pemeriksaan'));
  }

  public function show($id)
  {
    $pemeriksaan = Pemeriksaan::findOrFail($id);
    $data = null;
    $v = null;
    if ($pemeriksaan->id_tindakan == '1') {
      $data = Ibu_Hamil::where('id_pemeriksaan', $pemeriksaan->id)->first();
      $v = 'reports.ibuhamil';
    } elseif ($pemeriksaan->id_tindakan == '2') {
      $data = Ibu_Melahirkan::where('id_pemeriksaan', $pemeriksaan->id)->first();
      $v = 'reports.ibumelahirkan';
    } elseif ($pemeriksaan->id_tindakan == '3') {
      $data = Pemeriksaan_Kb::where('id_pemeriksaan', $pemeriksaan->id)->first();
      $v = 'reports.pemeriksaankb';
    } elseif ($pemeriksaan->id_tindakan == '4') {
      $data = Pemeriksaan_Anak::where('id_pemeriksaan', $pemeriksaan->id)->first();
      $v = 'reports.pemeriksaananak';
    }
    return view($v, compact('data', 'pemeriksaan'));
  }
}
