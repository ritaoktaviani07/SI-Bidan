@extends('sb-admin/app')

@section('title','Data Pemeriksaan Anak')

@section('content')

     <!-- Page Heading -->
     <h1 class="h3 mb-4 text-gray-800"> Tambah Data</h1>
    
        <form action="/pemeriksaan_anak" method="POST" class="mb-5">
            @csrf
            <div class="form-group">
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

            <div class="form-group">
                <label for="id_pasien">Nama Pasien</label>
                <input type="hidden" class="form-control" id="id_pasien" name="id_pasien">
                <input type="text" class="form-control" id="nama_pasien" name="nama_pasien" readonly>
                @error('nama_pasien')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="nama_ibu"> Nama Ibu </label>
                    <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" required>
                    @error('nama_ibu')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
            </div>

            <div class="form-group">
                <label for="tgl_lahir">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" required>
                    @error('tgl_lahir')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
            </div>

            <div class="form-group">
                <label for="bcg">BCG</label>
                    <input type="text" class="form-control" id="bcg" name="bcg" required>
                    @error('bcg')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
            </div>

            <div class="form-group">
                <label for="dpt">DPT</label>
                    <input type="text" class="form-control" id="dpt" name="dpt" required>
                    @error('dpt')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
            </div>

            <div class="form-group">
                <label for="polio">Polio</label>
                    <input type="text" class="form-control" id="polio" name="polio" required>
                    @error('polio')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
            </div>

            <div class="form-group">
                <label for="ipv">IPV</label>
                    <input type="text" class="form-control" id="ipv" name="ipv" required>
                    @error('ipv')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
            </div>

            <div class="form-group">
                <label for="campak">Campak</label>
                    <input type="text" class="form-control" id="campak" name="campak" required>
                    @error('campak')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
            </div>

            <div class="form-group">
                <label for="tetanus">Tetanus</label>
                    <input type="text" class="form-control" id="tetanus" name="tetanus" required>
                    @error('tetanus')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
            </div>
           
            <button type="submit" class="btn btn-primary btn-sm">Tambah</button>
            <a href="/pemeriksaan_anak" class="btn btn-secondary btn-sm">Kembali</a>
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