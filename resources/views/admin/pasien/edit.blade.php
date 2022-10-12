@extends('sb-admin/app')

@section('title','Edit Pasien')

@section('content')
     <!-- Page Heading -->
     <h1 class="h3 mb-4 text-gray-800">Edit Data Pasien</h1>

        <form action="/pasien/{{$pasien->id}}" method="POST">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="id_tindakan">Jenis Tindakan</label>
                    <input type="text" class="form-control" id="id_tindakan" name="id_tindakan"
                      value="{{$pasien->id_tindakan}}">
                    @error('id_tindakan')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                <label for="nama_pasien">Nama Pasien</label>
                    <input type="text" class="form-control" id="nama_pasien" name="nama_pasien"
                    value="{{$pasien->nama_pasien}}">
                    @error('nama_pasien')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                <label for="nik">NIK</label>
                    <input type="number" class="form-control" id="nik" name="nik"
                        value="{{$pasien->nik}}">
                    @error('nik')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                <label for="jenis_kelamin">Jenis Kelamin</label>
                    <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin"
                        value="{{$pasien->jenis_kelamin}}">
                    @error('jenis_kelamin')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                <label for="umur">Umur</label>
                    <input type="text" class="form-control" id="umur" name="umur"
                        value="{{$pasien->umur}}">
                    @error('umur')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                <label for="no_hp">No HP</label>
                    <input type="number" class="form-control" id="no_hp" name="no_hp"
                        value="{{$pasien->no_hp}}">
                    @error('no_hp')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                <label for="alamat">Alamat</label>
                    <input type="textarea" class="form-control" id="alamat" name="alamat"
                        value="{{$pasien->alamat}}">
                    @error('alamat')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror

            </div>

            <button type="submit" class="btn btn-primary btn-sm">Update</button>
            <a href="/pasien" class="btn btn-secondary btn-sm">Kembali</a>
        </form>
@endsection
