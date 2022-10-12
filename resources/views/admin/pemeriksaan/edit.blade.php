@extends('sb-admin/app')

@section('title','Edit Pemeriksaan Pasien')

@section('content')
     <!-- Page Heading -->
     <h1 class="h3 mb-4 text-gray-800">Edit Pemeriksaan Pasien</h1>

     <form action="/pemeriksaan/{{$pemeriksaan->id}}" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="id_pasien">ID Pasien</label>
                <input type="text" class="form-control" id="id_pasien" name="id_pasien"
                  value="{{$pemeriksaan->id_pasien}}">
                @error('id_pasien')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            <label for="id_tindakan">ID Tindakan</label>
                <input type="text" class="form-control" id="id_tindakan" name="id_tindakan"
                value="{{$pemeriksaan->id_tindakan}}">
                @error('id_tindakan')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            <label for="tgl_periksa">Tanggal Pemeriksaan</label>
                <input type="date" class="form-control" id="tgl_periksa" name="tgl_periksa"
                    value="{{$pemeriksaan->tgl_periksa}}">
                @error('tgl_periksa')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            
            <label for="keterangan">Keterangan</label>
                <input type="textarea" class="form-control" id="keterangan" name="keterangan"
                    value="{{$pemeriksaan->keterangan}}">
                @error('keterangan')
                    <small class="text-danger">{{ $message }}</small>
                @enderror

        </div>

        <button type="submit" class="btn btn-primary btn-sm">Update</button>
        <a href="/pemeriksaan" class="btn btn-secondary btn-sm">Kembali</a>
    </form>
@endsection
