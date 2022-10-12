@extends('sb-admin/app')

@section('title','Edit Data Pemeriksaan Kb')

@section('content')

     <!-- Page Heading -->
     <h1 class="h3 mb-4 text-gray-800"> Edit Data Pemeriksaan KB</h1>

     <form action="/pemeriksaan_kb/{{$pemeriksaan_kb[0]->id}}" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="tgl_periksa">Tgl Diperiksa</label>
                <input type="hidden" class="form-control" id="id_pemeriksaan" name="id_pemeriksaan" value="{{$pemeriksaan_kb[0]->id_pemeriksaan}}">
                <input type="text" class="form-control" id="tgl_periksa" name="tgl_periksa" value="{{ $pemeriksaan_kb[0]->pemeriksaan->tgl_periksa}}"  readonly>
                @error('tgl_periksa')
                <small class="text-danger">{{ $message }}</small>
                @enderror

            <label for="nama_pasien">Nama Pasien</label>
                <input type="hidden" class="form-control" id="id_pasien" name="id_pasien" value="{{$pemeriksaan_kb[0]->id_pasien}}">
                <input type="text" class="form-control" id="nama_pasien" name="nama_pasien" value="{{ $pemeriksaan_kb[0]->pasien->nama_pasien}}"  readonly>
                @error('nama_pasien')
                <small class="text-danger">{{ $message }}</small>
                @enderror

            <label for="berat_badan">Berat Badan</label>
                <input type="text" class="form-control" id="berat_badan" name="berat_badan"
                value="{{$pemeriksaan_kb[0]->berat_badan}}" required>
                @error('berat_badan')
                    <small class="text-danger">{{ $message }}</small>
                @enderror

            <label for="tekanan_darah">Tekanan Darah</label>
                <input type="text" class="form-control" id="tekanan_darah" name="tekanan_darah"
                value="{{$pemeriksaan_kb[0]->tekanan_darah}}" required>
                @error('tekanan_darah')
                    <small class="text-danger">{{ $message }}</small>
                @enderror

            <label for="kontrasepsi">Kontrasepsi</label>
                <input type="text" class="form-control" id="kontrasepsi" name="kontrasepsi"
                value="{{$pemeriksaan_kb[0]->kontrasepsi}}" required>
                @error('kontrasepsi')
                    <small class="text-danger">{{ $message }}</small>
                @enderror


        </div>

        <button type="submit" class="btn btn-primary btn-sm">Update</button>
        <a href="/pemeriksaan_kb" class="btn btn-secondary btn-sm">Kembali</a>
    </form>

@endsection