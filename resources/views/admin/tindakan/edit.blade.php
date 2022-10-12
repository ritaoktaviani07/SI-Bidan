@extends('sb-admin/app')

@section('title','Edit Tindakan')

@section('content')
     <!-- Page Heading -->
     <h1 class="h3 mb-4 text-gray-800">Edit Jenis Tindakan</h1>
    
        <form action="/tindakan/{{$tindakan->id}}" method="POST">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="jenis_tindakan">Jenis Tindakan</label>
                    <input type="text" class="form-control" id="jenis_tindakan" name="jenis_tindakan" value="{{$tindakan->jenis_tindakan}}">
                    @error('jenis_tindakan')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
            </div>
           
            <button type="submit" class="btn btn-primary btn-sm">Update</button>
            <a href="/tindakan" class="btn btn-secondary btn-sm">Kembali</a>
        </form>
@endsection