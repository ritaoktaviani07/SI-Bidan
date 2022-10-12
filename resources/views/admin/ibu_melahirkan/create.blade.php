@extends('sb-admin/app')

@section('title','Data Ibu Melahirkan')

@section('content')

     <!-- Page Heading -->
     <h1 class="h3 mb-4 text-gray-800"> Tambah Data</h1>
    
        <form action="/ibu_melahirkan" method="POST">
            @csrf
            <div class="row">
              <div class="col-md-6">
                <label for="id_pemeriksaan">Pilih Pemeriksaan </label>
                  <select name="id_pemeriksaan" id="id_pemeriksaan" class="form-control" required>
                    <option value="">Pilih</option>
                    @foreach ($pemeriksaan as $item)
                    <option value="{{ $item->id }}">ID:[{{ $item->id }}] {{ $item->tgl_periksa }} - {{ $item->pasien->nama_pasien }}</option>
                    @endforeach
                  </select>
                  @error('id_pemeriksaan')
                  <small class="text-danger">{{ $message }}</small>
                  @enderror
              </div>

            <div class="col-md-6">
                <label for="id_pasien">Nama Pasien</label>
                <input type="hidden" class="form-control" id="id_pasien" name="id_pasien">
                <input type="text" class="form-control" id="nama_pasien" name="nama_pasien" readonly>
                @error('nama_pasien')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="nama_anak">Nama Anak</label>
                <input type="text" class="form-control" id="nama_anak" name="nama_anak">
                @error('nama_anak')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="tgl_melahirkan">Tanggal Melahirkan</label>
                    <input type="date" class="form-control" id="tgl_melahirkan" name="tgl_melahirkan" required>
                    @error('tgl_melahirkan')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
            </div>
            
            <div class="col-md-6">
                <label for="jekel_anak">Jekel Anak</label>
                    {{-- <input type="text" class="form-control" id="jekel_anak" name="jekel_anak">
                    @error('jekel_anak')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror --}}
                  <div class="row">
                    <div class="form-check ml-2">
                      <input class="form-check-input" type="radio" name="jekel_anak" id="wanita" value="wanita" required>
                      <label class="form-check-label" for="wanita">
                        Wanita
                      </label>
                    </div>
                    <div class="form-check ml-4">
                      <input class="form-check-input" type="radio" name="jekel_anak" id="pria" value="pria" required>
                      <label class="form-check-label " for="pria">
                       Pria
                      </label>
                    </div>
                  </div>

            </div>

            <div class="col-md-6">        
                <label for="berat_anak">Berat Anak</label>
                    <input type="text" class="form-control" id="berat_anak" name="berat_anak" required>
                    @error('berat_anak')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
            </div>
            
            <div class="col-md-6">
                <label for="tinggi_anak">Tinggi Anak</label>
                    <input type="text" class="form-control" id="tinggi_anak" name="tinggi_anak" required>
                    @error('tinggi_anak')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
            </div>

    
            <div>

              <button type="submit" class="ml-2 btn btn-primary btn-sm mt-4">Tambah</button>
              <a href="/ibu_melahirkan" class="btn btn-secondary btn-sm mt-4">Kembali</a>
           
           
        </form>
@endsection


@section('js')
<script type="text/javascript">

    $(document).ready(function()
    { 
      $('#id_pemeriksaan').on('change', function() {
        var pemeriksaan_id = $(this).val();
        if(pemeriksaan_id) {
          $.ajax({
            url: '/getPemeriksaan/'+pemeriksaan_id,
            type: "GET",
            success:function(data)
            {
              if(data){
                $('#id_pasien').val(''); 
                $.each(data, function(key, pasien){
                  $('#id_pasien').val(pasien.id_pasien);
                  $('#nama_pasien').val(pasien.nama_pasien);
                });
              }else{
                $('#id_pasien').val('');
              }
            }
          });
        }else{
          $('#id_pasien').val('');
        }
      });
    });
</script>
@endsection