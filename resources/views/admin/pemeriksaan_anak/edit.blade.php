@extends('sb-admin/app')

@section('title','Edit Data Pemeriksaan Anak')

@section('content')

     <!-- Page Heading -->
     <h1 class="h3 mb-4 text-gray-800"> Edit Data Pemeriksaan Anak</h1>
    
     <form action="/pemeriksaan_anak/{{$pemeriksaan_anak[0]->id}}" method="POST" class="mb-5">
        @csrf
        @method('PATCH')
            <div class="form-group">
                <label for="tgl_periksa">Tgl Diperiksa</label>
                <input type="hidden" class="form-control" id="id_pemeriksaan" name="id_pemeriksaan" value="{{$pemeriksaan_anak[0]->id_pemeriksaan}}">
                <input type="text" class="form-control" id="tgl_periksa" name="tgl_periksa" value="{{ $pemeriksaan_anak[0]->pemeriksaan->tgl_periksa}}"  readonly>
                @error('tgl_periksa')
                <small class="text-danger">{{ $message }}</small>
                @enderror
                </div>

            <div class="form-group">
                <label for="nama_pasien">Nama Pasien</label>
                <input type="hidden" class="form-control" id="id_pasien" name="id_pasien" value="{{$pemeriksaan_anak[0]->id_pasien}}">
                <input type="text" class="form-control" id="nama_pasien" name="nama_pasien" value="{{ $pemeriksaan_anak[0]->pasien->nama_pasien}}"  readonly>
                @error('nama_pasien')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="nama_ibu">Nama Ibu</label>
                    <input type="text" class="form-control" id="nama_ibu" name="nama_ibu"
                    value="{{$pemeriksaan_anak[0]->nama_ibu}}" required>
                    @error('nama_ibu')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror 
            </div>
            
            <div class="form-group">

                <label for="tgl_lahir">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir"
                    value="{{$pemeriksaan_anak[0]->tgl_lahir}}" required>
                    @error('tgl_lahir')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
            </div>

            <div class="form-group">
            <label for="bcg">BCG</label>
                <input type="text" class="form-control" id="bcg" name="bcg"
                value="{{$pemeriksaan_anak[0]->bcg}}" required>
                @error('bcg')
                    <small class="text-danger">{{ $message }}</small>
                @enderror </div>


            <div class="form-group">
            <label for="dpt">DPT</label>
                <input type="text" class="form-control" id="dpt" name="dpt"
                value="{{$pemeriksaan_anak[0]->dpt}}" required>
                @error('dpt')
                    <small class="text-danger">{{ $message }}</small>
                @enderror

            </div>

            <div class="form-group">
            <label for="polio">Polio</label>
                <input type="text" class="form-control" id="polio" name="polio"
                value="{{$pemeriksaan_anak[0]->polio}}" required>
                @error('polio')
                    <small class="text-danger">{{ $message }}</small>
                @enderror </div>

            <div class="form-group">
            <label for="ipv">IPV</label>
                <input type="text" class="form-control" id="ipv" name="ipv"
                value="{{$pemeriksaan_anak[0]->ipv}}" required>
                @error('ipv')
                    <small class="text-danger">{{ $message }}</small>
                @enderror </div>

            <div class="form-group">
            <label for="campak">Campak</label>
                <input type="text" class="form-control" id="campak" name="campak"
                value="{{$pemeriksaan_anak[0]->campak}}" required>
                @error('campak')
                    <small class="text-danger">{{ $message }}</small>
                @enderror </div>

            <div class="form-group">
            <label for="tetanus">Tetanus</label>
                <input type="text" class="form-control" id="tetanus" name="tetanus"
                value="{{$pemeriksaan_anak[0]->tetanus}}" required>
                @error('tetanus')
                    <small class="text-danger">{{ $message }}</small>
                @enderror 
            </div>

          <button type="submit" class="btn btn-primary btn-sm">Update</button>
        <a href="/pemeriksaan_anak" class="btn btn-secondary btn-sm">Kembali</a>
            
        </div>
    </form>
        
@endsection