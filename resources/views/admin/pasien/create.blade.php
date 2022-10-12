@extends('sb-admin/app')

@section('title','Pendaftaran Pasien')

@section('content')
     <!-- Page Heading -->
     <h1 class="h3 mb-4 text-gray-800">Pendaftaran Pasien</h1>

        <form action="/pasien" method="POST">
            @csrf
                <div class="form-group">
                    <label for="id_tindakan">Jenis Tindakan </label>
                        <select class="form-control" id="id_tindakan" name="id_tindakan">
                          <option selected disabled> -- Pilih Tindakan -- </option>
                            @foreach ($tindakan as $row)
                                <option value="{{$row->id}}"> {{$row->jenis_tindakan}}</option>
                            @endforeach 
                        </select>
                        @error('id_tindakan')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                </div>

                <div class="form-group">
                    <label for="nama_pasien">Nama Pasien</label>
                        <input type="text" class="form-control" id="nama_pasien" name="nama_pasien">
                        @error('nama_pasien')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                </div>

                <div class="form-group">
                    <label for="nik">NIK</label>
                        <input type="number" class="form-control" id="nik" name="nik">
                        @error('nik')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                </div>

                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                        <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                        @error('jenis_kelamin')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                </div>
                
                <div class="form-group">
                    <label for="umur">Umur</label>
                        <input type="text" class="form-control" id="umur" name="umur">
                        @error('umur')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                </diV>

                <div class="form-group">
                    <label for="no_hp">No HP</label>
                        <input type="number" class="form-control" id="no_hp" name="no_hp">
                        @error('no_hp')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat</label>
                        <textarea  class="form-control" id="alamat" rows="3" name="alamat"> </textarea>
                        @error('alamat')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                </div>

            <button type="submit" class="btn btn-primary btn-sm">Tambah</button>
            <a href="/pasien" class="btn btn-secondary btn-sm">Kembali</a>
        </form>
@endsection
