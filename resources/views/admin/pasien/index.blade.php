@extends('sb-admin/app')

@section('title','Pendaftaran Pasien')

@section('content')
    {{-- Flash Data --}}
    {!!session('sukses')!!}

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Data Diri Pasien</h1>
    <a href="pasien/create" class="btn btn-primary btn-sm"> 
        <i class="fas fa-plus"></i>
        Tambah pasien</a> 

    @if ($pasien[0])
    <div class="card">
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Pasien</th>
                        <th scope="col">Jenis Tindakan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pasien as $row)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$row->nama_pasien}}</td>
                        <td>{{$row->id_tindakan}}</td>
    
                        <td width="35%">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="/pasien/{{$row->id}}" type="button" class="btn btn-info btn-sm mr-2">
                                    <i class="fas fa-eye"></i> Detail</a>
                                <a href="/pasien/{{$row->id}}/edit" type="button" class="btn btn-primary btn-sm mr-2">
                                    <i class="fas fa-edit"></i> Edit</a>
                                <a href="/pasien/{{$row->id}}/konfirmasi" class="btn btn-danger btn-sm mr-2">
                                        <i class="fas fa-trash"></i> Hapus </a>
                              </div>
                        </td>
    
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

   {{-- Pagination --}}
   {{ $pasien->links() }}
   @else
       <div class="alert alert-info mt-4" role="alert">
           Anda Belum Mempunyai Data
       </div>

   @endif

@endsection
