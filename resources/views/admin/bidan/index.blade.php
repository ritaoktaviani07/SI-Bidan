@extends('sb-admin/app')
@section('title', 'bidan')
@section('bidan', 'active')
@section('user', 'show')
@section('user-active', 'active')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Bidan</h1>

    <a href="/bidan/create" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah Bidan</a>


        {{-- table --}}
        <table class="table mt-4 table-hover table-bordered">
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
                <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bidan as $row)
                    <tr>
                    <th scope="row" width="15%">{{$loop->iteration}}</th>
                    <td>{{$row->name}}</td>
                    <td>{{$row->email}}</td>
                    <td width="15%">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="/bidan/{{$row->id}}/konfirmasi" class="btn btn-danger btn-sm mr-1"><i class="fas fa-trash"></i> Hapus</a>
                        </div>
                    </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{$bidan->links()}}
 
@endsection
