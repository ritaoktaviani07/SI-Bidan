@extends('sb-admin/app')

@section('title','Data Pemeriksaan KB')

@section('content')

     <!-- Page Heading -->
     <h1 class="h3 mb-4 text-gray-800"> Tambah Data</h1>
    
        <form action="/pemeriksaan_kb" method="POST">
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
                <label for="berat_badan">Berat Badan</label>
                    <input type="text" class="form-control" id="berat_badan" name="berat_badan" required>
                    @error('berat_badan')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
            </div>

            <div class="form-group">
                <label for="tekanan_darah">Tekanan Darah</label>
                    <input type="text" class="form-control" id="tekanan_darah" name="tekanan_darah" required>
                    @error('tekanan_darah')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
            </div>

            <div class="form-group">
                <label for="kontrasepsi">Kontrasepsi</label>
                    <input type="text" class="form-control" id="kontrasepsi" name="kontrasepsi" required>
                    @error('kontrasepsi')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
            </div>
           
            <button type="submit" class="btn btn-primary btn-sm">Tambah</button>
            <a href="/pemeriksaan_kb" class="btn btn-secondary btn-sm">Kembali</a>
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