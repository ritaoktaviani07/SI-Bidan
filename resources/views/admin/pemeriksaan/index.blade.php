@extends('sb-admin/app')

@section('title','Pemeriksaan Pasien')

@section('css')
    <link href="{{ asset('vendor/sb-admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    {{-- Flash Data --}}
    {!!session('sukses')!!}

     <!-- Page Heading -->
     <h1 class="h3 mb-4 text-gray-800">Konfirmasi Pemeriksaan Pasien</h1>
     <div class="card mb-4">
      <div class="card-header">
        Cetak Laporan
      </div>
      <div class="card-body">
        <form method="post" action="/report/pemeriksaan" target="_blank">
          @csrf
          <div class="form-row">
            <div class="col-md-12">
              <label for="rangetanggal">Pilih Range Tanggal</label>
              <div class="form-row">
                <div class="col-5">
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                    </div>
                    <input type="text" class="form-control" name="rangetanggal" readonly required>
                  </div>
                </div>
                <div class="col-2">
                  <button type="submit" class="btn btn-primary">Cetak</button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
     </div>
 
        {{-- <div class="btn-group mb-3">
            <a href="{{ route('pemeriksaanByStatus', ['status'=>'semua']) }}" class="btn btn-sm btn-primary mr-1">Semua</a>
            <a href="{{ route('pemeriksaanByStatus', ['status'=>'Menunggu Konfirmasi']) }}" class="btn btn-sm btn-info mr-1">Menunggu Konfirmasi</a>
            <a href="{{ route('pemeriksaanByStatus', ['status'=>'Sedang Diperiksa']) }}" class="btn btn-sm btn-warning mr-1">Sedang Diperiksa</a>
            <a href="{{ route('pemeriksaanByStatus', ['status'=>'Selesai Diperiksa']) }}" class="btn btn-sm btn-success mr-1">Selesai Diperiksa</a>
        </div> --}}
        <div class="card mb-5">
            <div class="card-header">
                {{-- <a href="pemeriksaan/create" class="btn btn-primary btn-sm"> 
                    <i class="fas fa-plus"></i>
                    Tambah Pemeriksaan</a> 

                <a href="{{ route('pemeriksaanPdf') }}" target="_blank"class="btn btn-success btn-sm"> 
                    <i class="fas fa-print"></i>
                    Laporan Pemeriksaan</a>  --}}
                <div class="btn-group mb-3">
                  Filter : 
                  <a href="{{ route('pemeriksaanByStatus', ['status'=>'semua']) }}" class="btn btn-sm btn-primary mr-1">Semua</a>
                  <a href="{{ route('pemeriksaanByStatus', ['status'=>'Menunggu Konfirmasi']) }}" class="btn btn-sm btn-info mr-1">Menunggu Konfirmasi</a>
                  <a href="{{ route('pemeriksaanByStatus', ['status'=>'Sedang Diperiksa']) }}" class="btn btn-sm btn-warning mr-1">Sedang Diperiksa</a>
                  <a href="{{ route('pemeriksaanByStatus', ['status'=>'Selesai Diperiksa']) }}" class="btn btn-sm btn-success mr-1">Selesai Diperiksa</a>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">

                <table class="table table-bordered" id="dataTable" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pasien</th>
                            <th>Jenis Tindakan</th>
                            <th>Tanggal Periksa</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pemeriksaan as $row)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$row->pasien->nama_pasien}}</td>
                            <td>{{$row->tindakan->jenis_tindakan}}</td>
                            <td>{{$row->tgl_periksa}}</td>
                            <td>
                              @if ($row->keterangan == "Menunggu Konfirmasi")
                              <span class="badge badge-pill badge-info">Menunggu Konfirmasi</span>
                              @elseif ($row->keterangan == "Sedang Diperiksa")
                              <span class="badge badge-pill badge-warning">Sedang Diperiksa</span>
                              @elseif ($row->keterangan == "Selesai Diperiksa")
                              <span class="badge badge-pill badge-success">Selesai Diperiksa</span>
                              @endif
                            </td>
    
                            <td>
                              <form action="{{ route('upstatus') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $row->id }}">
                                <div class="form-group">
                                  <div class="row">
                                    <div class="col-md-8">
                                      <select class="form-control" name="keterangan">

                                        <option value="Menunggu Konfirmasi"
                                        @if ($row->keterangan == "Menunggu Konfirmasi")
                                        selected
                                        @endif
                                        >Menunggu Konfirmasi</option>

                                        <option value="Sedang Diperiksa"
                                        @if ($row->keterangan == "Sedang Diperiksa")
                                        selected
                                        @endif
                                        >Sedang Diperiksa</option>

                                        <option value="Selesai Diperiksa"
                                        @if ($row->keterangan == "Selesai Diperiksa")
                                        selected
                                        @endif
                                        >Selesai Diperiksa</option>
                                      </select>
                                    </div>
                                    <div class="col-md-4">
                                      <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                                    </div>
                                  </div>
                                </div>
                              </form>
                                {{-- Button Aksi  --}}
                                    {{-- <a href="/pemeriksaan/{{$row->id}}/edit" type="button" class="btn btn-primary btn-sm mr-2">
                                        <i class="fas fa-edit"></i> Edit</a>
                                    <a href="/pemeriksaan/{{$row->id}}/konfirmasi" class="btn btn-danger btn-sm mr-2">
                                            <i class="fas fa-trash"></i> Hapus </a>
                                  </div> --}}
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

    {{-- date range picker --}}
    <script type="text/javascript" src="{{ asset('daterange/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('daterange/daterangepicker.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('daterange/daterangepicker.css') }}" />

    <script type="text/javascript">
      $(function() {
        $('input[name="rangetanggal"]').daterangepicker({
          opens: 'right',
          locale: {
             "format": "DD/MM/YYYY",
          }
        });
      });
      
    </script>

@endsection