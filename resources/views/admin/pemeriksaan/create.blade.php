@extends('sb-admin/app')

@section('title','Pemeriksaan Pasien')

@section('content')
     <!-- Page Heading -->
     <h1 class="h3 mb-4 text-gray-800">Pemeriksaan Pasien</h1>

        <form action="/pemeriksaan" method="POST">
            @csrf
            <div class="form-group">
                <label for="id_pasien">Id Pasien</label>
                    <input type="text" class="form-control" id="id_pasien" name="id_pasien">
                    @error('id_pasien')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
            </div>

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
                <label for="tgl_periksa">Tanggal Pemeriksaan </label>
                    <input type="date" class="form-control" id="tgl_periksa" name="tgl_periksa">
                    @error('tgl_periksa')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
            </div>

            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                    <textarea  type="text" class="form-control" id="keterangan" name="keterangan"></textarea >
                    @error('keterangan')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror               

            </div>

            <button type="submit" class="btn btn-primary btn-sm">Tambah</button>
            <a href="/pemeriksaan" class="btn btn-secondary btn-sm">Kembali</a>
        </form>
@endsection
