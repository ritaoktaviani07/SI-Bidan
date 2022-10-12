@extends('sb-admin/app')
@section('title', 'bidan')
@section('bidan', 'active')
@section('user', 'show')
@section('user-active', 'active')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">bidan</h1>

    <form action="/bidan" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama">bidan</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{old('nama')}}">
            @error('nama')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}">
            @error('email')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password">
            @error('password')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="password_confirmation">Ulangi Password</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
            @error('password')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary btn-sm">Tambah</button>
        <a href="/bidan" class="btn btn-secondary btn-sm">Kembali</a>
    </form>
@endsection