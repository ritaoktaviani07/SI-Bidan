@extends('layouts.maze.app')
@section('title_page', $title_page)

@section('css')
  <link rel="stylesheet" href="{{ asset('vendor/maze/css/shared/iconly.css') }}" />
@endsection

@section('content')
				<div class="content-wrapper container">
					<div class="page-heading">
						<h3>{{$title_page}}</h3>
					</div>
					<div class="page-content">
						<section class="row">
							<div class="col-12">
								<div class="row">
                  <div class="col-12 col-lg-3 col-md-6">
										<div class="card">
											<div class="card-body px-4 py-4-5">
												<div class="row">
                          <a href="{{ route('visitor.mprofile') }}">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                              <div class="stats-icon blue mb-2">
															  <i class="iconly-boldProfile"></i>
                              </div>
                            </div>
                          </a>
													<div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
														<h6 class="text-muted font-semibold">Profil</h6>
														<h6 class="font-extrabold mb-0">Lengkapin dan Manajemen Profil Anda</h6>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="col-12 col-lg-3 col-md-6">
										<div class="card">
											<div class="card-body px-4 py-4-5">
												<div class="row">
                          <a href="{{ route('visitor.mregistrasi') }}">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                              <div class="stats-icon purple mb-2">
                                <i class="iconly-boldPaper-Plus"></i>
                              </div>
                            </div>
                          </a>
													<div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
														<h6 class="text-muted font-semibold">
															Registrasi
														</h6>
														<h6 class="font-extrabold mb-0">Daftarkan Pemeriksaan Anda</h6>
													</div>
												</div>
											</div>
										</div>
									</div>
									
									<div class="col-12 col-lg-3 col-md-6">
										<div class="card">
											<div class="card-body px-4 py-4-5">
												<div class="row">
                          <a href="{{ route('visitor.mreport') }}">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                              <div class="stats-icon green mb-2">
															<i class="iconly-boldPaper-Download"></i>
                              </div>
                            </div>
                          </a>
													<div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
														<h6 class="text-muted font-semibold">Hasil Pemeriksaan</h6>
														<h6 class="font-extrabold mb-0">Lihat Hasil Pemeriksaan Anda</h6>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-12 col-lg-3 col-md-6">
										<div class="card">
											<div class="card-body px-4 py-4-5">
												<div class="row">
                          <a href="#">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                              <div class="stats-icon red mb-2">
															<i class="iconly-boldChat"></i>
                              </div>
                            </div>
                          </a>
													<div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
														<h6 class="text-muted font-semibold">Konsultasi</h6>
														<h6 class="font-extrabold mb-0">Silahkan ajukan keluhan anda!</h6>
													</div>
												</div>
											</div>
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
