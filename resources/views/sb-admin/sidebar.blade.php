 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('landing') }}">
                {{-- <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div> --}}
                <div class="sidebar-brand-text mx-3">SI-Bidan</div>
            </a>

            <!-- Navbar -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ Nav::isRoute('dashboard') }}">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Nav Item - table : Pemeriksaan -->
            <li class="nav-item {{ Nav::hasSegment('pemeriksaan') }}">
                <a class="nav-link" href="{{ route('pemeriksaan.index') }}">
                    {{-- <i class="fas fa-fw fa-square-plus"></i> --}}
                    <i class="fas fa-notes-medical"></i>
                    
                    <span>Pemeriksaan Pasien </span></a>
            </li>

            <!-- Nav Item - Registrasi Pasien -->
            {{-- <li class="nav-item">
                <a class="nav-link" href="/pasien">
                    <i class="fas fa-fw fa-copy"></i>
                    <span>Registrasi</span></a>
            </li> --}}

             <!-- Nav Item - Pemeriksaan Pasien -->
            {{-- <li class="nav-item">
                <a class="nav-link" href="/pemeriksaan">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Pemeriksaan Pasien</span></a>
            </li> --}}

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                MAIN
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item {{ Nav::hasSegment(['ibu_hamil', 'ibu_melahirkan', 'pemeriksaan_kb', 'pemeriksaan_anak']) }}">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    {{-- <i class="fas fa-fw fa-cog"></i> --}}
                    <i class="fas fa-stethoscope"></i>
                    <span>Jenis Tindakan</span>
                </a>
                <div id="collapseTwo" class="collapse {{ Nav::hasSegment(['ibu_hamil', 'ibu_melahirkan', 'pemeriksaan_kb', 'pemeriksaan_anak'], 1, 'show') }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item {{ Nav::isRoute('ibu_hamil.*') }}" href="/ibu_hamil">Ibu Hamil</a>
                        <a class="collapse-item {{ Nav::isRoute('ibu_melahirkan.*') }}" href="/ibu_melahirkan">Ibu Melahirkan</a>
                        <a class="collapse-item {{ Nav::isRoute('pemeriksaan_kb.*') }}" href="/pemeriksaan_kb">Pemeriksaan KB</a>
                        <a class="collapse-item {{ Nav::isRoute('pemeriksaan_anak.*') }}" href="/pemeriksaan_anak">Pemeriksaan Anak</a>

                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            {{-- <hr class="sidebar-divider"> --}}
            <!-- Heading -->
            <div class="sidebar-heading">
                MASTER
            </div>
            <li class="nav-item {{ Nav::hasSegment(['tindakan', 'pasien']) }}">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    {{-- <i class="fas fa-fw fa-wrench"></i> --}}
                    <i class="fas fa-medkit"></i>
                    <span>Data Master</span>
                </a>
                <div id="collapseUtilities" class="collapse {{ Nav::hasSegment(['tindakan', 'pasien'], 1, 'show') }}" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        {{-- <h6 class="collapse-header">Custom Utilities:</h6> --}}
                        <a class="collapse-item  {{ Nav::isRoute('tindakan.*') }}" href="/tindakan">Tindakan</a>
                        <a class="collapse-item  {{ Nav::isRoute('pasien.*') }}" href="/pasien">Data Diri Pasien</a>
                        {{-- <a class="collapse-item" href="/kunjungan_pasien">Kunjungan Pasien</a> --}}

                    </div>
                </div>
            </li>

             <!-- Nav Item - Registrasi Pasien -->
             <li class="nav-item  {{ Nav::isRoute('rekam_medis.*') }}">
                <a class="nav-link" href="/rekam_medis">
                    {{-- <i class="fas fa-fw fa-copy"></i> --}}
                    <i class="fas fa-book-medical"></i>
                    <span>Rekam Medis </span></a>
            </li>


            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#pengaturan" aria-expanded="true"
                    aria-controls="main">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Pengaturan</span>
                </a>
                <div id="pengaturan" class="collapse" aria-labelledby="headingPages"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="/footer">Footer</a>
                        <a class="collapse-item" href="forgot-password.html">About</a>

                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts -->
            {{-- <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Charts</span></a>
            </li> --}}

            <!-- Nav Item - User -->

            @role('admin')
             <!-- Divider -->
             <hr class="sidebar-divider">
                <!-- Heading -->
                <div class="sidebar-heading">ADMIN</div>

                <!-- Nav Item - Pages Collapse Menu -->
                    <li class="nav-item @yield('user-active')">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#user" aria-expanded="true" aria-controls="user">
                        {{-- <i class="fas fa-fw fa-users"></i> --}}
                        <i class="fas fa-user-md"></i>

                        <span>User</span>
                        </a>
                        <div id="user" class="collapse @yield('user')" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item @yield('admin')" href="/admin">Admin</a>
                            <a class="collapse-item @yield('bidan')" href="/bidan">Bidan</a>
                            <a class="collapse-item @yield('pengunjung')" href="/pembaca">Pengunjung</a>
                        </div>
                        </div>
                    </li>
            @endrole

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
