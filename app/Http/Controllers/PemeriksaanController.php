<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemeriksaan;
use App\Models\Tindakan;
use App\Models\Footer;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use RealRashid\SweetAlert\Facades\Alert;
use PDF;
use Illuminate\Support\Facades\DB;

class PemeriksaanController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */

  public function __construct()
  {
    $this->footer = Footer::select('konten')->first();
  }

  public function index()
  {
    $footer = $this->footer;

    $pemeriksaan = Pemeriksaan::orderBy('tgl_periksa', 'DESC')->get();
    $tindakan = Tindakan::all();

    return view('admin.pemeriksaan.index', compact('pemeriksaan', 'footer'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $footer = $this->footer;

    $tindakan = Tindakan::select('id', 'jenis_tindakan')->get();
    return view('admin/pemeriksaan/create', compact('tindakan', 'footer'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $request->validate([
      'id_pasien' => 'required',
      'id_tindakan' => 'required',
      'tgl_periksa' => 'required',
      'keterangan' => 'required',
    ]);

    Pemeriksaan::create([

      'id_pasien' => $request->id_pasien,
      'id_tindakan' => $request->id_tindakan,
      'tgl_periksa' => $request->tgl_periksa,
      'keterangan' => $request->keterangan,
    ]);
    Alert::success('Sukses', 'Data Berhasil Ditambahkan');

    return redirect('/pemeriksaan');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $footer = $this->footer;
    $pemeriksaan = Pemeriksaan::select(
      'id',
      'id_pasien',
      'id_tindakan',
      'tgl_periksa',
      'keterangan'
    )->whereId($id)->first();
    return view('admin/pemeriksaan/edit', compact('pemeriksaan', 'footer'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $request->validate([
      'id_pasien' => 'required',
      'id_tindakan' => 'required',
      'tgl_periksa' => 'required',
      'keterangan' => 'required',
    ]);

    Pemeriksaan::whereId($id)->update([
      'id_pasien' => $request->id_pasien,
      'id_tindakan' => $request->id_tindakan,
      'tgl_periksa' => $request->tgl_periksa,
      'keterangan' => $request->keterangan,
    ]);

    Alert::success('Sukses', 'Data Berhasil Diubah');
    return redirect('/pemeriksaan');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */

  public function konfirmasi($id)
  {
    alert()->question('Peringatan!', 'Anda yakin akan menghapus data ?')
      ->showConfirmButton('<a href="/pemeriksaan/' . $id . '/delete" class="text-white"
        style="text-decoration:none"> Hapus </a>', '#3085d6')->toHtml()
      ->showCancelButton('Batal', '#aaa')->reverseButtons();

    return redirect('/pemeriksaan');
  }

  public function delete($id)
  {
    Pemeriksaan::whereId($id)->delete();

    Alert::success('Sukses', 'Data Berhasil Dihapus');
    return redirect('/pemeriksaan');
  }

  public function showByStatus($status)
  {
    if ($status == "semua") {
      return redirect('/pemeriksaan');
    }
    $footer = $this->footer;

    $pemeriksaan = Pemeriksaan::where('keterangan', $status)
      ->orderBy('tgl_periksa', 'DESC')
      ->get();
    $tindakan = Tindakan::all();
    return view('admin.pemeriksaan.index', compact('pemeriksaan', 'footer'));
  }

  public function updateStatus(Request $request)
  {
    $qstatus  = Pemeriksaan::findOrFail($request->id);
    $qstatus  = $qstatus->update([
      'keterangan'  => $request->keterangan,
    ]);

    if ($qstatus) {
      Alert::success('Sukses', 'Berhasil Update');
      return redirect('/pemeriksaan');
    } else {
      Alert::error('Gagal', 'Gagal Update');
      return redirect('/pemeriksaan');
    }
  }


  public function laporan()
  {
    $data_pemeriksaan = DB::table('pemeriksaan')->get();
    $pdf= PDF::loadview('admin.lap_pemeriksaan',[
          'data_pemeriksaan'=>$data_pemeriksaan
    ]);


    // return $pdf->download('admin.pemeriksaan');
    return $pdf->stream();

  }



}
