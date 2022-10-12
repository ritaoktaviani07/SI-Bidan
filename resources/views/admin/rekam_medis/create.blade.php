@extends('sb-admin/app')

@section('title','Rekam Medis')

@section('content')
     <!-- Page Heading -->
     <h1 class="h3 mb-4 text-gray-800">Data Rekam Medis Pasien</h1>

        <form action="/rekam_medis" method="POST">
            @csrf
            <div class="form-group">
                <label for="id_pasien">Nama Pasien</label>
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
                <label for="tgl_periksa">Tanggal Periksa </label>
                    <input type="date" class="form-control" id="tgl_periksa" name="tgl_periksa">
                    @error('tgl_periksa')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
            </div>

            {{-- <div class="form-group">
                <label for="hasil">Hasil Pemeriksaan</label>
                    <textarea  type="text" class="form-control" id="hasil" name="hasil"></textarea >
                    @error('hasil')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror               

            </div> --}}

            <button type="submit" class="btn btn-primary btn-sm">Tambah</button>
            <a href="/rekam_medis" class="btn btn-secondary btn-sm">Kembali</a>
        </form>
@endsection
