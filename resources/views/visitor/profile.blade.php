@extends('layouts.maze.app')
@section('title_page', $title_page)

@section('css')
  <link rel="stylesheet" href="{{ asset('vendor/maze/css/shared/iconly.css') }}" />
@endsection

@section('content')
				<div class="content-wrapper container">
          
					<div class="page-heading">
            <div class="page-title">
              <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                  <h3>{{$title_page}}</h3>
                  <p class="text-subtitle text-muted">Lengkapin dan Manajemen Profil Anda</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                  <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ route('visitor.index') }}">Dashboard</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Profile</li>
                    </ol>
                  </nav>
                </div>
              </div>
            </div>
          </div>


					<div class="page-content">
						<section class="row match-height justify-content-md-center">
							
              <div class="col-lg-8 col-12">
                <div class="card">
                    {{-- <div class="card-header">
                        <h4 class="card-title"></h4>
                    </div> --}}
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal" method="POST" action="{{ route('up-profile') }}">
                              @csrf
                              <input type="hidden" name="iduser" value="{{ Auth::user()->id }}">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>NIK</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group has-icon-left">
                                                <div class="position-relative">
                                                    <input type="number" class="form-control" placeholder="NIK" value="{{ Auth::user()->visitor->nik }}" name="nik" required>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-postcard"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <label>Name</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group has-icon-left">
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" placeholder="Nama" value="{{ Auth::user()->visitor->nama_pasien }}" name="nama_pasien" required>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-person"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <label>Email</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group has-icon-left">
                                                <div class="position-relative">
                                                    <input type="email" class="form-control" value="{{ Auth::user()->email }}" name="email" disabled>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-envelope"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <label>Nomor Hp</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group has-icon-left">
                                                <div class="position-relative">
                                                    <input type="number" class="form-control" placeholder="Nomor Hp" value="{{ Auth::user()->visitor->no_hp }}" name="no_hp" required>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-phone"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <label>Umur</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group has-icon-left">
                                                <div class="position-relative">
                                                    <input type="number" class="form-control" placeholder="Umur" value="{{ Auth::user()->visitor->umur }}" name="umur" required>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-balloon-heart"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <label>Jenis Kelamin</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                              <div class="position-relative">
                                                <div class="row">
                                                  <div class="col-6">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="jkpria" value="pria"
                                                        @if (Auth::user()->visitor->jenis_kelamin == "pria")
                                                        checked=""
                                                        @endif
                                                        >
                                                        <label class="form-check-label" for="jkpria">
                                                            Pria
                                                        </label>
                                                    </div>
                                                  </div>
                                                  <div class="col-6">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="jkwanita" value="wanita"
                                                        @if (Auth::user()->visitor->jenis_kelamin == "wanita")
                                                        checked=""
                                                        @endif
                                                        >
                                                        <label class="form-check-label" for="jkwanita">
                                                            Wanita
                                                        </label>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <label>Alamat</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group has-icon-left">
                                                <div class="position-relative">
                                                    <textarea class="form-control" rows="3" name="alamat" required>{{ Auth::user()->visitor->umur }}</textarea>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-house"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
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
@endsection
