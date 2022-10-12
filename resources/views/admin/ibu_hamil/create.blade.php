@extends('sb-admin/app')

@section('title','Data Ibu Hamil')

@section('content')

     <!-- Page Heading -->
     <h1 class="h3 mb-4 text-gray-800"> Tambah Data</h1>
        <form action="/ibu_hamil" method="POST" class="my-5">
            @csrf

            <div class="row">
                <div class="col-md-4">
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
                <div class="col-md-4">
                    <label for="id_pasien">Nama Pasien</label>
                    <input type="hidden" class="form-control" id="id_pasien" name="id_pasien">
                    <input type="text" class="form-control" id="nama_pasien" name="nama_pasien" readonly>
                    @error('nama_pasien')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                    
                </div> 
                <div class="col-md-4">
                    <label for="gpah">GPAH</label>
                    <input type="text" class="form-control" id="gpah" name="gpah" required>
                    @error('gpah')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    
                </div> 
                <div class="col-md-4">
                    <label for="hpl">HPL</label>
                    <input type="date" class="form-control" id="hpl" name="hpl" required>
                    @error('hpl')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    
                </div> 
                <div class="col-md-4">
                    <label for="usia_kehamilan">Usia Kehamilan</label>
                    <input type="text" class="form-control" id="usia_kehamilan" name="usia_kehamilan" required>
                    @error('usia_kehamilan')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    
                </div> 
                <div class="col-md-4">
                    <label for="jarak_anak">Jarak Anak</label>
                    <input type="text" class="form-control" id="jarak_anak" name="jarak_anak" required>
                    @error('jarak_anak')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    
                </div> 
                <div class="col-md-4">
                    <label for="tekanan_darah">Tekanan Darah</label>
                    <input type="text" class="form-control" id="tekanan_darah" name="tekanan_darah" required>
                    @error('tekanan_darah')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    
                </div> 
                <div class="col-md-4">
                    <label for="berat_badan"> Berat Badan</label>
                    <input type="text" class="form-control" id="berat_badan" name="berat_badan" required>
                    @error('berat_badan')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    
                </div> 
                
                <div class="col-md-4">
                    <label for="tinggi_fungsi_uteri">Tinggi Fungi Uteri</label>
                    <input type="text" class="form-control" id="tinggi_fungsi_uteri" name="tinggi_fungsi_uteri" required>
                    @error('tinggi_fungsi_uteri')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    
                </div> 
                <div class="col-md-4">
                    <label for="letak_janin">Letak Janin</label>
                    <input type="text" class="form-control" id="letak_janin" name="letak_janin" required>
                    @error('letak_janin')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    
                </div> 

                <div class="col-md-4">
                    <label for="detak_jantung_janin">Detak Jantung Janin</label>
                    <input type="text" class="form-control" id="detak_jantung_janin" name="detak_jantung_janin" required>
                    @error('detak_jantung_janin')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
    
                <div class="col-md-4">
                    <label for="taksiran_persalinan">Taksiran Persalinan</label>
                    <input type="date" class="form-control" id="taksiran_persalinan" name="taksiran_persalinan" required>
                    @error('taksiran_persalinan')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                
            </div>
           
            <button type="submit" class="btn btn-primary btn-sm mt-4">Tambah</button>
            <a href="/ibu_hamil" class="btn btn-secondary btn-sm mt-4">Kembali</a>
            </div>
          
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