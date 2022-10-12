@extends('sb-admin/app')

@section('title','Data Tindakan')

@section('content')
    {{-- Flash Data --}}
    {!!session('sukses')!!}

     <!-- Page Heading -->
     <h1 class="h3 mb-4 text-gray-800">Data Tindakan</h1>
     <a href="tindakan/create" class="btn btn-primary btn-sm"> 
        <i class="fas fa-plus"></i>
        Tambah Tindakan</a>


        @if ($tindakan[0])
        {{-- table --}}
        <table class="table mt-4 table-hover table-bordered">
            <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Jenis Tindakan</th>
                <th scope="col">Aksi</th>
            </tr>
            </thead>
            <tbody>
                @foreach($tindakan as $row)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$row->jenis_tindakan}}</td>
                        <td width="">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="/tindakan/{{$row->id}}/edit"class="btn btn-primary btn-sm mr-2">
                                    <i class="fas fa-edit"></i> Edit</a>
                                    {{-- <form action="/tindakan/{{$row->id}}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i> Hapus</button>
                                    </form> --}}
                                <a href="/tindakan/{{$row->id}}/konfirmasi" class="btn btn-danger btn-sm mr-2">
                                    <i class="fas fa-trash"></i> Hapus </a>

                              </div>
                        </td>

                    </tr>
                @endforeach
           
            </tbody>
        </table>

       {{-- Pagination --}}
       {{ $tindakan->links() }}
       @else
           <div class="alert alert-info mt-4" role="alert">
               Anda Belum Mempunyai Data
           </div>

       @endif
       

@endsection