<div class="container-fluid page-body-wrapper">
    <!-- partial:partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="mdi mdi-home menu-icon"></i>
                    <span class="menu-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false"
                    aria-controls="ui-basic">
                    <i class="mdi mdi-view-headline menu-icon"></i>
                    <span class="menu-title">Menu Penilaian</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-basic">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{ route('kriteria.index') }}">Kriteria</a>
                        </li>
                        <li class="nav-item"> <a class="nav-link" href="{{ route('indikator.index') }}">Indikator</a>
                        </li>
                        <li class="nav-item"> <a class="nav-link" href="{{ route('pegawai.index') }}">Pegawai</a>
                        </li>
                        <li class="nav-item"> <a class="nav-link" href="{{ route('skala.index') }}">Skala</a>
                        </li>
                        <li class="nav-item"> <a class="nav-link" href="{{ route('nilai.index') }}">Nilai</a>
                        </li>

                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('user.index') }}">
                    <i class="mdi mdi-home menu-icon"></i>
                    <span class="menu-title">Users Manajement</span>
                </a>
            </li>

            </li>
        </ul>
    </nav>
