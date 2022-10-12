@extends('sb-admin/app')

@section('title', 'Data Rekam Medis')

@section('css')
    <link href="{{ asset('vendor/sb-admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    {{-- Flash Data --}}
    {!! session('sukses') !!}

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Laporan Rekam Medis </h1>

    {{-- @if ($pemeriksaan_kb[0]) --}}

        <div class="card">
            <div class="card-header">
                {{-- <a href="rekam_medis/create" class="btn btn-primary btn-sm"> 
                    <i class="fas fa-plus"></i>
                    Tambah Rekam Medis</a>  --}}
            </div>
            <div class="card-body">

              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Pasien</th>
                            <th scope="col">Jenis Tindakan</th>
                            <th scope="col">Tanggal Periksa</th>
                            <th scope="col">Hasil Pemeriksaan</th>
                       
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rekam_medis as $row)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$row->pasien->nama_pasien}}</td>
                        <td>{{$row->tindakan->jenis_tindakan}}</td>
                        <td>{{$row->pemeriksaan->tgl_periksa}}</td>                       
                     
                        <td width="35%">
                            <div class="btn-group" role="group" aria-label="Basic example">
                              <a href="{{ route('rekamoneprint', ['id'=>$row->id]) }}" type="button"
                                class="btn btn-primary btn-sm" target="_blank">
                                <i class="fas fa-print"></i> Print</a>
                              <a href="{{ route('rekam_medis.show', ['rekam_medi'=>$row->id]) }}" type="button" class="btn btn-info btn-sm" target="_blank">
                                <i class="fas fa-eye"></i> Preview</a>
                            </div>
                        </td>

                    </tr>
                @endforeach
                    </tbody>
                </table>

              </div>
            </div>
        </div>

@endsection


@section('js')
    <script src="{{ asset('vendor/sb-admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/sb-admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('vendor/sb-admin/js/demo/datatables-demo.js') }}"></script>
@endsection

