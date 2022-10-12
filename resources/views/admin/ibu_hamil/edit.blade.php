@extends('sb-admin/app')

@section('title','Edit Data Ibu Hamil')

@section('content')

     <!-- Page Heading -->
     <h1 class="h3 mb-4 text-gray-800"> Edit Data Pemeriksaan Ibu Hamil</h1>
    
     <form action="/ibu_hamil/{{$ibu_hamil[0]->id}}" method="POST" class="pb-4">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <div class="row"> 
                <div class="col-md-4">
            <label for="tgl_periksa">Tgl Diperiksa</label>
                <input type="hidden" class="form-control" id="id_pemeriksaan" name="id_pemeriksaan" value="{{$ibu_hamil[0]->id_pemeriksaan}}">
                <input type="text" class="form-control" id="tgl_periksa" name="tgl_periksa" value="{{ $ibu_hamil[0]->pemeriksaan->tgl_periksa}}"  readonly>
                @error('tgl_periksa')
                <small class="text-danger">{{ $message }}</small>
                @enderror
                </div>
                <div class="col-md-4">
            <label for="nama_pasien">Nama Pasien</label>
                <input type="hidden" class="form-control" id="id_pasien" name="id_pasien" value="{{$ibu_hamil[0]->id_pasien}}">
                <input type="text" class="form-control" id="nama_pasien" name="nama_pasien" value="{{ $ibu_hamil[0]->pasien->nama_pasien}}"  readonly>
                @error('nama_pasien')
                <small class="text-danger">{{ $message }}</small>
                @enderror
                </div>
                <div class="col-md-4">
            <label for="gpah">GPAH</label>
                <input type="text" class="form-control" id="gpah" name="gpah"
                value="{{$ibu_hamil[0]->gpah}}">
                @error('gpah')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
                </div>
                <div class="col-md-4">
            <label for="hpl">HPL</label>
                <input type="date" class="form-control" id="hpl" name="hpl"
                    value="{{$ibu_hamil[0]->hpl}}">
                @error('hpl')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
                </div>
                <div class="col-md-4">
            <label for="usia_kehamilan">Usia Kehamilan</label>
                <input type="text" class="form-control" id="usia_kehamilan" name="usia_kehamilan"
                    value="{{$ibu_hamil[0]->usia_kehamilan}}">
                @error('usia_kehamilan')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
                </div>
                <div class="col-md-4">
            <label for="jarak_anak">Jarak Anak</label>
                <input type="text" class="form-control" id="jarak_anak" name="jarak_anak"
                    value="{{$ibu_hamil[0]->jarak_anak}}">
                @error('jarak_anak')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
                </div>
                <div class="col-md-4">
            <label for="tekanan_darah">Tekanan Darah</label>
                <input type="text" class="form-control" id="tekanan_darah" name="tekanan_darah"
                    value="{{$ibu_hamil[0]->tekanan_darah}}">
                @error('tekanan_darah')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
                </div>
                <div class="col-md-4">
            <label for="berat_badan">Berat Badan</label>
                <input type="text" class="form-control" id="berat_badan" name="berat_badan"
                    value="{{$ibu_hamil[0]->berat_badan}}">
                @error('berat_badan')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
                </div>
                <div class="col-md-4">
            <label for="tinggi_fungsi_uteri">Tinggi Fungsi Uteri</label>
                <input type="text" class="form-control" id="tinggi_fungsi_uteri" name="tinggi_fungsi_uteri"
                    value="{{$ibu_hamil[0]->tinggi_fungsi_uteri}}">
                @error('tinggi_fungsi_uteri')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
                </div>
                <div class="col-md-4">
            <label for="letak_janin">Letak Janin</label>
                <input type="text" class="form-control" id="letak_janin" name="letak_janin"
                    value="{{$ibu_hamil[0]->letak_janin}}">
                @error('letak_janin')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
                </div>
                <div class="col-md-4">
            <label for="detak_jantung_janin">Detak Jantung Janin</label>
                <input type="text" class="form-control" id="detak_jantung_janin" name="detak_jantung_janin"
                    value="{{$ibu_hamil[0]->detak_jantung_janin}}">
                @error('detak_jantung_janin')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
                </div>
                <div class="col-md-4">

            <label for="taksiran_persalinan">Taksiran Persalinan</label>
                <input type="date" class="form-control" id="taksiran_persalinan" name="taksiran_persalinan"
                    value="{{$ibu_hamil[0]->taksiran_persalinan}}">
                @error('taksiran_persalinan')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
                </div>
        </div>

        <button type="submit" class="btn btn-primary btn-sm mt-4">Update</button>
        <a href="/ibu_hamil" class="btn btn-secondary btn-sm mt-4">Kembali</a>
    </form>
        
@endsection
