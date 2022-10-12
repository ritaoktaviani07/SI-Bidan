@extends('sb-admin/app')

@section('title', 'Data Ibu Hamil')

@section('css')
    <link href="{{ asset('vendor/sb-admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    {{-- Flash Data --}}
    {!! session('sukses') !!}

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Data Ibu Hamil</h1>
    <a href="ibu_hamil/create" class="btn btn-primary btn-sm">
      <i class="fas fa-plus"></i> Tambah Data
    </a>
    
    @empty($ibu_hamil)
    <div class="alert alert-info mt-4" role="alert">
      Anda Belum Mempunyai Data
    </div>
     @else
    <div class="card my-5">
      <div class="card-header">
        Data Selesai Diperiksa
      </div>
      <div class="card-body">
        <div class="table-responsive">
          {{-- table --}}
          <table class="table table-bordered" id="dataTable" width="100%">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Tgl Diperiksa</th>
                <th scope="col">Nama Pasien</th>
                <th scope="col">Usia Kehamilan</th>
                <th scope="col">Taksiran Persalinan</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($ibu_hamil as $row)
              <tr id="idbaris{{$row->id}}">
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$row->pemeriksaan->tgl_periksa}}</td>
                <td>{{$row->pasien->nama_pasien}}</td>
                <td>{{$row->usia_kehamilan}} minggu</td>
                <td>{{$row->taksiran_persalinan}}</td>
                <td width="35%">
                  <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-info btn-sm mr-2" data-toggle="modal" data-target="#mdl-{{ $row->id }}">
                      <i class="fas fa-eye"></i> Detail
                    </button>
                    <a href="/ibu_hamil/{{ $row->id }}/edit" type="button" class="btn btn-primary btn-sm mr-2">
                      <i class="fas fa-edit"></i> Edit
                    </a>
                    <button onclick="deleteItem(this)" data-id="{{ $row->id }}" class="btn btn-danger btn-sm mr-2">
                      <i class="fas fa-trash"></i> Hapus
                    </button>
                  </div>

                    {{-- modal  --}}
<div class="modal fade" id="mdl-{{ $row->id }}" tabindex="-1" role="dialog" aria-labelledby="mdl-{{ $row->id }}-label" aria-hidden="true">
  <div class="modal-dialog modal-lg"  role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4  class="modal-title" id="mdl-{{ $row->id }}-label">Lihat Data Ibu Hamil</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table">
          <tbody>
            <tr> 
              <td>Nama Pasien </td> <td>:</td> <td>{{$row->pasien->nama_pasien}}</td>
            </tr>
            <tr>
              <td>Tanggal pemeriksaan</td> <td>:</td> <td>{{$row->pemeriksaan->tgl_periksa}}</td>
            </tr>
            <tr> 
              <td> GPAH </td> <td>:</td> <td>{{$row->gpah}}</td>
            </tr>
            <tr>
              <td> HPL </td> <td>:</td> <td>{{$row->hpl}} </td>
            </tr>
            <tr>
              <td> Usia Kehamilan</td> <td>:</td> <td>{{$row->usia_kehamilan}}</td>
            </tr>
            <tr>
              <td> Tekanan Darah</td> <td>:</td> <td>{{$row->tekanan_darah}}</td>
            </tr>
            <tr>
              <td> Berat Badan</td> <td>:</td> <td>{{$row->berat_badan}}</td>
            </tr>
            <tr>
              <td>Tinggi Fungsi Uteri </td> <td>:</td> <td>{{$row->tinggi_fungsi_uteri}}</td>
            </tr>
            <tr>
              <td> Letak Janin </td> <td>:</td> <td>{{$row->letak_janin}} </td>
            </tr>
            <tr>
              <td> Detak Jantung Janin</td> <td>:</td> <td>{{$row->detak_jantung_janin}}</td>
            </tr>
            <tr>
              <td> Taksiran Persalinan</td> <td>:</td> <td>{{$row->taksiran_persalinan}}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
                {{-- end modal  --}}

                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
    @endempty

@endsection

@section('js')
    <script src="{{ asset('vendor/sb-admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/sb-admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('vendor/sb-admin/js/demo/datatables-demo.js') }}"></script>

    {{-- sweet alert --}}
    <script src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>
    <script type="application/javascript">

        function deleteItem(e){

            let id = e.getAttribute('data-id');
            swal.fire({
                title: 'Peringatan!',
                text: "Anda yakin akan menghapus data ?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Hapus!',
                cancelButtonText: 'Tidak!',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    if (result.isConfirmed){

                        $.ajax({
                            type:'DELETE',
                            url:'{{url("/ibu_hamil")}}/' +id,
                            data:{
                                "_token": "{{ csrf_token() }}",
                            },
                            success:function(data) {
                                if (data.success){
                                    swal.fire({
                                      text: 'Berhasil Hapus Data',
                                      customClass: {
                                        container: 'position-absolute'
                                      },
                                      toast: true,
                                      position: 'top-right'
                                    });
                                    $("#idbaris"+id+"").remove(); 
                                }

                            }
                        });

                    }

                } else if (
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swal.fire({
                      text: 'Data tidak tihapus',
                      customClass: {
                        container: 'position-absolute'
                      },
                      toast: true,
                      position: 'top-right'
                    });
                }
            });

        }

    </script>
@endsection