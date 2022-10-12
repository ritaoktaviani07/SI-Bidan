@extends('sb-admin/app')

@section('title','Edit Data Ibu Melahirkan')

@section('content')

     <!-- Page Heading -->
     <h1 class="h3 mb-4 text-gray-800"> Edit Data Ibu Melahirkan</h1>
    
     <form action="/ibu_melahirkan/{{$ibu_melahirkan[0]->id}}" method="POST">
        @csrf
        @method('PATCH')
        <div class="row">
            <div class="col-md-6">
            <label for="tgl_periksa">Tgl Diperiksa</label>
                <input type="hidden" class="form-control" id="id_pemeriksaan" name="id_pemeriksaan" value="{{$ibu_melahirkan[0]->id_pemeriksaan}}">
                <input type="text" class="form-control" id="tgl_periksa" name="tgl_periksa" value="{{ $ibu_melahirkan[0]->pemeriksaan->tgl_periksa}}"  readonly>
                @error('tgl_periksa')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-md-6">
            <label for="nama_pasien">Nama Pasien</label>
                <input type="hidden" class="form-control" id="id_pasien" name="id_pasien" value="{{$ibu_melahirkan[0]->id_pasien}}">
                <input type="text" class="form-control" id="nama_pasien" name="nama_pasien" value="{{ $ibu_melahirkan[0]->pasien->nama_pasien}}"  readonly>
                @error('nama_pasien')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="col-md-6">
            <label for="nama_anak">Nama Anak</label>
                <input type="text" class="form-control" id="nama_anak" name="nama_anak" value="{{ $ibu_melahirkan[0]->nama_anak}}">
                @error('nama_anak')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="col-md-6">
            <label for="tgl_melahirkan">Tanggal Melahirkan</label>
                <input type="date" class="form-control" id="tgl_melahirkan" name="tgl_melahirkan"
                value="{{$ibu_melahirkan[0]->tgl_melahirkan}}">
                @error('tgl_melahirkan')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-md-6">
              <label for="jekel_anak">Jekel Anak</label>

                {{-- <input type="text" class="form-control" id="jekel_anak" name="jekel_anak"
                value="{{$ibu_melahirkan[0]->jekel_anak}}">
                @error('jekel_anak')
                    <small class="text-danger">{{ $message }}</small>
                @enderror --}}
                <div class="row">
                  <div class="form-check ml-2">
                    <input class="form-check-input" type="radio" name="jekel_anak" id="wanita" value="wanita" 
                    @if ($ibu_melahirkan[0]->jekel_anak == "wanita")
                    checked=""
                    @endif
                    >
                    <label class="form-check-label" for="wanita">Wanita</label>
                  </div>
                  <div class="form-check ml-4">
                    <input class="form-check-input" type="radio" name="jekel_anak" id="pria" value="pria"
                    @if ($ibu_melahirkan[0]->jekel_anak == "pria")
                    checked=""
                    @endif
                    >
                    <label class="form-check-label " for="pria">Pria</label>
                  </div>
                </div>


            </div>
            <div class="col-md-6">
            <label for="berat_anak">Berat Anak</label>
                <input type="text" class="form-control" id="berat_anak" name="berat_anak"
                value="{{$ibu_melahirkan[0]->berat_anak}}">
                @error('berat_anak')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-md-6">
            <label for="tinggi_anak">Tinggi Anak</label>
                <input type="text" class="form-control" id="tinggi_anak" name="tinggi_anak"
                value="{{$ibu_melahirkan[0]->tinggi_anak}}">
                @error('tinggi_anak')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>

        <button type="submit" class="ml-2 btn btn-primary btn-sm mt-4">Update</button>
        <a href="/ibu_melahirkan" class="btn btn-secondary btn-sm mt-4">Kembali</a>
    </form>
        
@endsection