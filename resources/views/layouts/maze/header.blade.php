        <header class="mb-5">
					<div class="header-top">
						<div class="container">
							<div class="logo">
								<a href="{{ route('landing') }}">
                  <img src="{{ asset('vendor/maze/images/logo/logo.svg') }}" alt="Logo"/>
                </a>
							</div>
							<div class="header-top-right">
								<div class="dropdown">
									<a href="#" id="topbarUserDropdown" class="user-dropdown d-flex align-items-center dropend dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="avatar avatar-md2">
                      @if (Auth::user()->visitor->jenis_kelamin == "pria")
                        <img src="{{ asset('vendor/maze/images/faces/pria.jpg') }}" alt="Avatar"/>
                      @else
                        <img src="{{ asset('vendor/maze/images/faces/wanita.jpg') }}" alt="Avatar"/>
                      @endif
										</div>
										<div class="text">
											<h6 class="user-dropdown-name">{{ Auth::user()->name }}</h6>
											<p class="user-dropdown-status text-sm text-muted">
												Pasien
											</p>
										</div>
									</a>
									<ul class="dropdown-menu dropdown-menu-end shadow-lg" aria-labelledby="topbarUserDropdown">
										<li>
                      <!-- TODO -->
                      <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                      </a>
                      
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                      </form>
										</li>
									</ul>
								</div>

								<!-- Burger button responsive -->
								<a href="#" class="burger-btn d-block d-xl-none">
									<i class="bi bi-justify fs-3"></i>
								</a>
							</div>
						</div>
					</div>
					<nav class="main-navbar">
						<div class="container">
							<ul>
								<li class="menu-item {{ Nav::isRoute('visitor.index') }}">
									<a href="{{ route('visitor.index') }}" class="menu-link">
										<i class="bi bi-grid-fill"></i>
										<span>Dashboard</span>
									</a>
								</li>
								<li class="menu-item {{ Nav::isRoute('visitor.m*') }} has-sub">
									<a href="#" class="menu-link">
										<i class="bi bi-grid-1x2-fill"></i>
										<span>Menu</span>
									</a>
									<div class="submenu">
										<div class="submenu-group-wrapper">
											<ul class="submenu-group">
                        <li class="submenu-item">
													<a href="{{ route('visitor.mprofile') }}" class="submenu-link">Profil</a>
												</li>

												<li class="submenu-item">
													<a href="{{ route('visitor.mregistrasi') }}" class="submenu-link">Registrasi</a>
												</li>

												<li class="submenu-item">
													<a href="{{ route('visitor.mreport') }}" class="submenu-link">Hasil Pemeriksaan</a>
												</li>

												<li class="submenu-item">
													<a href="#" class="submenu-link">Konsultasi</a>
												</li>
											</ul>
										</div>
									</div>
								</li>

								<li class="menu-item">
									<a href="#" class="menu-link">
										<i class="bi bi-life-preserver"></i>
										<span>Tentang</span>
									</a>
								</li>
							</ul>
						</div>
					</nav>
				</header>