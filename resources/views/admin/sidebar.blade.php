<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link @yield('master-data') @yield('akademik') @yield('exam') @yield('keuangan')  @yield('transaksi-pembayaran') @yield('profile')"
                href="/home">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        {{-- Hak Akses Menu  --}}
        @if(Auth::user()->level == 1)
        <li class="nav-item">
            <a class="nav-link @yield('dashboard') @yield('master-data') @yield('exam') @yield('keuangan') @yield('transaksi-pembayaran') @yield('profile')"
                data-bs-target="#user-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-person"></i><span>User</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="user-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="/level">
                        <i class="bi bi-circle"></i><span>Level</span>
                    </a>
                </li>
                <li>
                    <a href="/user">
                        <i class="bi bi-circle"></i><span>User</span>
                    </a>
                </li>
                <li>
                    <a href="/notifikasi">
                        <i class="bi bi-circle"></i><span>Notifikasi</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Forms Nav -->

        <li class="nav-item">
            <a class="nav-link @yield('dashboard') @yield('akademik') @yield('exam') @yield('keuangan') @yield('transaksi-pembayaran') @yield('profile')"
                data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Master Data</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="/tp">
                        <i class="bi bi-circle"></i><span>Tahun Pelajaran</span>
                    </a>
                </li>
                <li>
                    <a href="/ruang">
                        <i class="bi bi-circle"></i><span>Ruangan</span>
                    </a>
                </li>
                <li>
                    <a href="/jurusan">
                        <i class="bi bi-circle"></i><span>Jurusan</span>
                    </a>
                </li>
                <li>
                    <a href="/kelas">
                        <i class="bi bi-circle"></i><span>Kelas</span>
                    </a>
                </li>
                <li>
                    <a href="/agama">
                        <i class="bi bi-circle"></i><span>Agama</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Components Nav -->

        <li class="nav-item">
            <a class="nav-link @yield('dashboard') @yield('master-data') @yield('exam') @yield('keuangan') @yield('transaksi-pembayaran') @yield('profile')"
                data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-person-circle"></i><span>Data Pengguna</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="/admin">
                        <i class="bi bi-circle"></i><span>Administrator</span>
                    </a>
                </li>
                <li>
                    <a href="/sekolah">
                        <i class="bi bi-circle"></i><span>Sekolah</span>
                    </a>
                </li>
                <li>
                    <a href="/guru">
                        <i class="bi bi-circle"></i><span>Guru</span>
                    </a>
                </li>
                <li>
                    <a href="/siswa">
                        <i class="bi bi-circle"></i><span>Siswa</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Forms Nav -->

        <li class="nav-item">
            <a class="nav-link @yield('dashboard') @yield('master-data') @yield('exam') @yield('keuangan') @yield('transaksi-pembayaran') @yield('profile')"
            data-bs-target="#collapseElement" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>Akademik</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="collapseElement" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="/mapel">
                        <i class="bi bi-circle"></i><span>Mata Pelajaran</span>
                    </a>
                </li>
                <li>
                    <a href="/jadwal">
                        <i class="bi bi-circle"></i><span>Jadwal Pelajaran</span>
                    </a>
                </li>
                <li>
                    <a href="/materi">
                        <i class="bi bi-circle"></i><span>Materi Mata Pelajaran</span>
                    </a>
                </li>
                <li>
                    <a href="/tugas">
                        <i class="bi bi-circle"></i><span>Tugas Mata Pelajaran</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Forms Nav -->

        <li class="nav-item">
            <a class="nav-link @yield('dashboard') @yield('master-data') @yield('akademik') @yield('keuangan') @yield('transaksi-pembayaran') @yield('profile')"
                data-bs-target="#ujian-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-book"></i><span>Exam</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="ujian-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="/exam">
                        <i class="bi bi-circle"></i><span>Jadwal Exam</span>
                    </a>
                </li>
                <li>
                    <a href="/paketsoal">
                        <i class="bi bi-circle"></i><span>Paket Soal</span>
                    </a>
                </li>
                <li>
                    <a href="/soal">
                        <i class="bi bi-circle"></i><span>Soal Exam</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="bi bi-circle"></i><span>Hasil Exam</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link @yield('dashboard') @yield('master-data') @yield('akademik') @yield('keuangan') @yield('transaksi-pembayaran') @yield('profile')"
                data-bs-target="#nilai-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-card-list"></i><span>Nilai Siswa</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="nilai-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="#">
                        <i class="bi bi-circle"></i><span>Nilai UTS</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="bi bi-circle"></i><span>Nilai UAS</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="bi bi-circle"></i><span>Nilai Raport</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link @yield('dashboard') @yield('master-data') @yield('akademik') @yield('exam') @yield('transaksi-pembayaran') @yield('profile')"
                data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-layout-text-window-reverse"></i><span>Keuangan</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="/detpangkal">
                        <i class="bi bi-circle"></i><span>Uang pangkal</span>
                    </a>
                </li>
                <li>
                    <a href="/rekappangkal">
                        <i class="bi bi-circle"></i><span>Rekap Pangkal</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Tables Nav -->

        <li class="nav-item">
            <a class="nav-link @yield('dashboard') @yield('master-data') @yield('akademik') @yield('exam') @yield('keuangan') @yield('profile')"
                data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-bar-chart"></i><span>Transaksi Pembayaran</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="/bayarsiswa">
                        <i class="bi bi-circle"></i><span>Bayar Siswa</span>
                    </a>
                </li>
                <li>
                    <a href="/bayar">
                        <i class="bi bi-circle"></i><span>Bayar</span>
                    </a>
                </li>
                <li>
                    <a href="pembayaran">
                        <i class="bi bi-circle"></i><span>Pembayaran</span>
                    </a>
                </li>
            </ul>
        </li>

        @elseif(Auth::user()->level == 2)
        {{-- <li class="nav-item">
            <a class="nav-link @yield('dashboard') @yield('akademik') @yield('exam') @yield('keuangan') @yield('transaksi-pembayaran') @yield('profile')"
                data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Master Data</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="/tp">
                        <i class="bi bi-circle"></i><span>Tahun Pelajaran</span>
                    </a>
                </li>
                <li>
                    <a href="/ruang">
                        <i class="bi bi-circle"></i><span>Ruangan</span>
                    </a>
                </li>
                <li>
                    <a href="/jurusan">
                        <i class="bi bi-circle"></i><span>Jurusan</span>
                    </a>
                </li>
                <li>
                    <a href="/kelas">
                        <i class="bi bi-circle"></i><span>Kelas</span>
                    </a>
                </li>
                <li>
                    <a href="/agama">
                        <i class="bi bi-circle"></i><span>Agama</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Components Nav --> --}}

        <li class="nav-item">
            <a class="nav-link @yield('dashboard') @yield('master-data') @yield('exam') @yield('keuangan') @yield('transaksi-pembayaran') @yield('profile')"
                data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-person-circle"></i><span>Data Pengguna</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                {{-- <li>
                    <a href="/guru">
                        <i class="bi bi-circle"></i><span>Guru</span>
                    </a>
                </li> --}}
                <li>
                    <a href="/siswa">
                        <i class="bi bi-circle"></i><span>Siswa</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Forms Nav -->

        <li class="nav-item">
            <a class="nav-link @yield('dashboard') @yield('master-data') @yield('exam') @yield('keuangan') @yield('transaksi-pembayaran') @yield('profile')"
            data-bs-target="#collapseElement" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>Akademik</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="collapseElement" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="/mapel">
                        <i class="bi bi-circle"></i><span>Mata Pelajaran</span>
                    </a>
                </li>
                <li>
                    <a href="/jadwal">
                        <i class="bi bi-circle"></i><span>Jadwal Pelajaran</span>
                    </a>
                </li>
                <li>
                    <a href="/bahan">
                        <i class="bi bi-circle"></i><span>Bahan Mata Pelajaran</span>
                    </a>
                </li>
                <li>
                    <a href="/tugas">
                        <i class="bi bi-circle"></i><span>Tugas Mata Pelajaran</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Forms Nav -->

        <li class="nav-item">
            <a class="nav-link @yield('dashboard') @yield('master-data') @yield('akademik') @yield('keuangan') @yield('transaksi-pembayaran') @yield('profile')"
                data-bs-target="#ujian-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-book"></i><span>Exam</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="ujian-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="/exam">
                        <i class="bi bi-circle"></i><span>Jadwal Exam</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="bi bi-circle"></i><span>Soal Exam</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="bi bi-circle"></i><span>Hasil Exam</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link @yield('dashboard') @yield('master-data') @yield('akademik') @yield('keuangan') @yield('transaksi-pembayaran') @yield('profile')"
                data-bs-target="#nilai-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-card-list"></i><span>Nilai Siswa</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="nilai-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="#">
                        <i class="bi bi-circle"></i><span>Nilai UTS</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="bi bi-circle"></i><span>Nilai UAS</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="bi bi-circle"></i><span>Nilai Raport</span>
                    </a>
                </li>
            </ul>
        </li>

        {{-- <li class="nav-item">
            <a class="nav-link @yield('dashboard') @yield('master-data') @yield('akademik') @yield('exam') @yield('transaksi-pembayaran') @yield('profile')"
                data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-layout-text-window-reverse"></i><span>Keuangan</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="/detpangkal">
                        <i class="bi bi-circle"></i><span>Uang pangkal</span>
                    </a>
                </li>
                <li>
                    <a href="/rekappangkal">
                        <i class="bi bi-circle"></i><span>Rekap Pangkal</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Tables Nav -->

        <li class="nav-item">
            <a class="nav-link @yield('dashboard') @yield('master-data') @yield('akademik') @yield('exam') @yield('keuangan') @yield('profile')"
                data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-bar-chart"></i><span>Transaksi Pembayaran</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="/bayarsiswa">
                        <i class="bi bi-circle"></i><span>Bayar Siswa</span>
                    </a>
                </li>
                <li>
                    <a href="/bayar">
                        <i class="bi bi-circle"></i><span>Bayar</span>
                    </a>
                </li>
                <li>
                    <a href="pembayaran">
                        <i class="bi bi-circle"></i><span>Pembayaran</span>
                    </a>
                </li>
            </ul>
        </li> --}}

        @endif

        <li class="nav-heading">Pages</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="/logout">
                <i class="bi bi-box-arrow-right"></i>
                <span>Logout</span>
            </a>
        </li><!-- End Login Page Nav -->



    </ul>

</aside>
