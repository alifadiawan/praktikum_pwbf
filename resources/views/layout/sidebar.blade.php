<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alippy</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                {{-- dashboard --}}
                <li class="nav-item">
                    <a href="/" class="nav-link  {{ (request()->is('/')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Home
                        </p>
                    </a>
                </li>

                {{-- mahasiswa --}}
                <li class="nav-item {{ (request()->is('mahasiswa*')) ? 'menu-open' : '' }}">
                    <a href="/mahasiswa" class="nav-link ">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Master Mahasiswa
                        </p>
                        <i class="right fas fa-angle-left"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/mahasiswa"
                                class="nav-link {{ (request()->is('mahasiswa')) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Master Mahasiswa</p>

                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('mahasiswa/mata-kuliah') }}" class="nav-link {{ (request()->is('mahasiswa/mata-kuliah')) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Master MK</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('mahasiswa/kelas') }}" class="nav-link  {{ (request()->is('mahasiswa/kelas')) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Master Kelas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('mahasiswa/dosen') }}" class="nav-link {{ (request()->is('mahasiswa/dosen')) ? 'active' : '' }} ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Master Dosen</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- perkuliahan --}}
                <li class="nav-item">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Perkuliahan
                        </p>
                        <i class="right fas fa-angle-left"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('/perkuliahan') }}"
                                class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Jadwal Kuliah</p>

                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/perkuliahan') }}" class="nav-link  ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Jadwal Ujian</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/perkuliahan') }}" class="nav-link  ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Absen Mahasiswa</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/perkuliahan') }}" class="nav-link  ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Nilai Mahasiswa</p>
                            </a>
                        </li>
                    </ul>
                </li>


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
