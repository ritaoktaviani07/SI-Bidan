@extends('layouts.maze.app')
@section('title_page', $title_page)

@section('css')
  <link rel="stylesheet" href="{{ asset('vendor/maze/css/shared/iconly.css') }}" />
  <link rel="stylesheet" href="{{ asset('vendor/maze/extensions/simple-datatables/style.css') }}" />
  <link rel="stylesheet" href="{{ asset('vendor/maze/css/pages/simple-datatables.css') }}" />
@endsection

@section('content')
				<div class="content-wrapper container">
          
					<div class="page-heading">
            <div class="page-title">
              <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                  <h3>{{$title_page}}</h3>
                  <p class="text-subtitle text-muted">Lihat Hasil Pemeriksaan Anda</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                  <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ route('visitor.index') }}">Dashboard</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Hasil</li>
                    </ol>
                  </nav>
                </div>
              </div>
            </div>
          </div>


					<div class="page-content">
						<section class="row match-height justify-content-md-center">
							
              <div class="col-12">
                <div class="card">
                    {{-- <div class="card-header">
                        <h4 class="card-title"></h4>
                    </div> --}}
                    <div class="card-content">
                        <div class="card-body">
                            

                          <table class="table table-striped" id="table1">
                            <thead>
                              <tr>
                                <th>Jenis Tindakan</th>
                                <th>Tanggal Diperiksa</th>
                                <th>Status</th>
                                <th>Hasil Pemeriksaan</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach ($pemeriksaan as $row)
                              <tr>
                                <td>{{ $row->tindakan->jenis_tindakan }}</td>
                                <td>{{ $row->tgl_periksa }}</td>
                                <td>
                                  @if ($row->keterangan == "Menunggu Konfirmasi")
                                  <span class="badge bg-info">Menunggu Konfirmasi</span>
                                  @elseif ($row->keterangan == "Sedang Diperiksa")
                                  <span class="badge bg-warning">Sedang Diperiksa</span>
                                  @elseif ($row->keterangan == "Selesai Diperiksa")
                                  <span class="badge bg-success">Selesai Diperiksa</span>
                                  @endif
                                </td>
                                <td>
                                  @if ($row->keterangan == "Selesai Diperiksa")
                                  <a href="{{ route('printreport', ['id'=>$row->id]) }}" class="btn icon icon-left btn-light btn-sm mr-2" target="_blank">
                                    <i class="bi bi-printer"></i> Print 
                                  </a>
                                  <a href="{{ route('showreport', ['id'=>$row->id]) }}" class="btn icon icon-left btn-light btn-sm mr-2" target="_blank">
                                    <i class="bi bi-eye"></i> Preview
                                  </a>
                                  @else
                                  <span class="badge bg-danger">Hasil Pemeriksaan Belum Ada</span>
                                  @endif
                                </td>
                              </tr>
                              @endforeach
                            </tbody>
                          </table>


                        </div>
                    </div>
                </div>
            </div>

						</section>
					</div>
				</div>
@endsection

@section('js')
  <script src="{{ asset('vendor/maze/js/pages/horizontal-layout.js') }}"></script>
  <script src="{{ asset('vendor/maze/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
  <script src="{{ asset('vendor/maze/js/pages/simple-datatables.js') }}"></script>
@endsection
