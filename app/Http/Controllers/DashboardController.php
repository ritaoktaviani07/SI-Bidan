<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ibu_Hamil;
use App\Models\Ibu_Melahirkan;
use App\Models\Pemeriksaan_Kb;
use App\Models\Pemeriksaan_Anak;
use App\Models\Footer;

class DashboardController extends Controller
{

    public function __construct(){
        $this->footer = Footer::select('konten')->first();
    }

    public function index(){
        $footer = $this->footer;

        $jumlah_ibu_hamil = Ibu_Hamil::count();
        $jumlah_ibu_melahirkan = Ibu_Melahirkan::count();
        $jumlah_pemeriksaan_kb = Pemeriksaan_Kb::count();
        $jumlah_pemeriksaan_anak = Pemeriksaan_Anak::count();
       

        return view('admin/dashboard',compact('jumlah_ibu_hamil','jumlah_ibu_melahirkan',
            'jumlah_pemeriksaan_kb','jumlah_pemeriksaan_anak','footer'));
        }
}
