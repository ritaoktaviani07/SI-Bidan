@extends('sb-admin/app')

@section('title', 'Pemeriksaan KB')

@section('css')
    <link href="{{ asset('vendor/sb-admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    {{-- Flash Data --}}
    {!! session('sukses') !!}

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Data Pemeriksaan KB</h1>
    <a href="pemeriksaan_kb/create" class="btn btn-primary btn-sm">
        <i class="fas fa-plus"></i>
        Tambah Data</a>

    @empty($pemeriksaan_kb)
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
                    <th scope="col">Berat Badan</th>
                    <th scope="col">Tekanan Darah</th>
                    <th scope="col">Kontrasepsi</th>
                    <th scope="col">Aksi</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($pemeriksaan_kb as $row)
                    <tr id="idbaris{{$row->id}}">
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$row->pemeriksaan->tgl_periksa}}</td>
                        <td>{{$row->pasien->nama_pasien}}</td>
                        <td>{{$row->berat_badan}}</td>
                        <td>{{$row->tekanan_darah}}</td>
                        <td>{{$row->kontrasepsi}}</td>

                        <td width="">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="/pemeriksaan_kb/{{ $row->id }}/edit" type="button"
                                    class="btn btn-primary btn-sm mr-2">
                                    <i class="fas fa-edit"></i> Edit</a>

                                <button onclick="deleteItem(this)" data-id="{{ $row->id }}" class="btn btn-danger btn-sm mr-2">
                                <i class="fas fa-trash"></i> Hapus
                              </button>
                            </div>
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
                            url:'{{url("/pemeriksaan_kb")}}/' +id,
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
