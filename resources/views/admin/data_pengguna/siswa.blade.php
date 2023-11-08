@extends('admin.dashboard')
@section('akademik', 'collapsed')
@section('content')
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="card-title inline-block">Data Siswa</h5>
                            </div>
                            <div>
                                <button class="btn btn-danger rounded-pill px-4" style="font-size: 0.75rem"
                                    data-bs-toggle="modal" data-bs-target="#modal2">Import Excel</button>
                                <button class="btn btn-primary rounded-pill px-4" style="font-size: 0.9rem"
                                    data-bs-toggle="modal" data-bs-target="#modalsiswa"> + siswa</button>
                            </div>
                        </div>
                        <hr>
                        <form class="search-form d-flex justify-content-end position-relative" method="POST"
                            action="#">
                            <input type="text" name="query" placeholder="Search" title="Enter search keyword"
                                class="outline-none rounded-pill border px-3 h-5" style="outline: none;">
                            <button type="submit" title="Search"
                                class="bg-primary position-absolute top-0 right-0 text-white rounded- border-0 h-100 px-2"
                                style="border-radius: 0 50% 50% 0;"><i class="bi bi-search"></i></button>
                        </form>
                        <!-- Table with hoverable rows -->
                        <div style="overflow-x:auto;">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">NIS</th>
                                        <th scope="col">NISN</th>
                                        <th scope="col">NamaSiswa</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">Password</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Aktif</th>
                                        <th scope="col">Gambar</th>
                                        <th scope="col">Level</th>
                                        <th scope="col">Kelas</th>
                                        <th scope="col">Jurusan</th>
                                        <th scope="col">Ruang</th>
                                        <th scope="col">Agama</th>
                                        <th scope="col">Tp</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                  $no=1;
                    foreach ($data as $index =>  $value) {
                    # code...
                  ?>
                                    <tr>
                                        <td scope="row">{{ $index + $data->firstItem() }}</td>
                                        <td>{{ $value->nis }} </td>
                                        <td>{{ $value->nisn }} </td>
                                        <td>{{ $value->nama_siswa }} </td>
                                        <td>{{ $value->username }} </td>
                                        <td>{{ $value->password }} </td>
                                        <td>{{ $value->email }} </td>
                                        <td>{{ $value->aktif }} </td>
                                        <td><img src=" {{ asset('gambarsiswa/' . $value->gambar) }}" alt=""
                                                width="40px" height="40px" class="rounded-circle"></td>
                                        <td>{{ $value->level->nama_level }} </td>
                                        <td>{{ $value->kelas->nama_kelas }} </td>
                                        <td>{{ $value->jurusan->nama_jurusan }} </td>
                                        <td>{{ $value->ruang->nama_ruang }} </td>
                                        <td>{{ $value->agama->nama_agama }} </td>
                                        <td>{{ $value->tp->tahun_pelajaran }} </td>

                                        <td>
                                            <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                                data-bs-target="#editModal{{ $value->id }}"><i
                                                    class="bi bi-pencil"></i></button>
                                            <a href="/hapusSiswa/{{ $value->id }}" button type="button"
                                                class="btn btn-danger"
                                                onClick="return confirm('Yakin akan menghapus data ini!')"><i
                                                    class="bi bi-trash"></i></button></a>
                                        </td>
                                    </tr>

                                    <?php $no++; } ?>

                                </tbody>
                            </table>
                            {{ $data->links() }}
                        </div>
                        <!-- End Table with hoverable rows -->

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Modal -->
    <div class="modal fade" id="modalsiswa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg ">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Form Input siswa </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-lg-12">


                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"></h5>

                                <!-- Browser Default Validation -->

                                <form method="POST" action="/prosesSiswa" class="row g-3" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-2 col-form-label">NIS </label>
                                        <div class="col-sm-10">
                                            <input type="text" name="nis" class="form-control" placeholder="Masukkan NIS">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-2 col-form-label">NISN Siswa</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="nisn" class="form-control" placeholder="Masukkan NISN">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-2 col-form-label">Nama Siswa</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="nama_siswa" class="form-control" placeholder="Masukkan Nama">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="inputUsername" class="col-sm-2 col-form-label">Username</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="username" class="form-control" placeholder="Masukkan Username">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                                        <div class="col-sm-10">
                                            <input type="password" name="password" class="form-control" placeholder="Masukkan Password">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" name="email" class="form-control" placeholder="Masukkan Email">
                                        </div>
                                    </div>


                                    <fieldset class="row mb-3">
                                        <legend class="col-form-label col-sm-2 pt-0">Aktif</legend>
                                        <div class="col-sm-10">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="aktif"
                                                    id="gridRadios1" value="Y" checked>
                                                <label class="form-check-label" for="gridRadios1">
                                                    Aktif
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="aktif"
                                                    id="gridRadios2" value="N">
                                                <label class="form-check-label" for="gridRadios2">
                                                    Tidak Aktif
                                                </label>
                                            </div>

                                        </div>
                                    </fieldset>


                                    <div class="row mb-3">
                                        <label for="inputNumber" class="col-sm-2 col-form-label">Gambar</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="file" name="gambar" id="gambar">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="id_level">Nama Level</label>
                                        <select class="form-control" id="id_level" name="id_level">
                                            <option value="">Pilih Nama Level</option>
                                            @foreach ($level as $items)
                                                <option value="{{ $items->id }}">{{ $items->nama_level }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="id_kelas">Nama Kelas</label>
                                        <select class="form-control" id="id_kelas" name="id_kelas">
                                            <option value="">Pilih Nama Kelas</option>
                                            @foreach ($kelas as $items)
                                                <option value="{{ $items->id }}">{{ $items->nama_kelas }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="id_jurusan">Nama Jurusan</label>
                                        <select class="form-control" id="id_jurusan" name="id_jurusan">
                                            <option value="">Pilih Nama Jurusan</option>
                                            @foreach ($jurusan as $items)
                                                <option value="{{ $items->id }}">{{ $items->nama_jurusan }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="id_ruang">Nama Ruang</label>
                                        <select class="form-control" id="id_ruang" name="id_ruang">
                                            <option value="">Pilih Nama Ruang</option>
                                            @foreach ($ruang as $items)
                                                <option value="{{ $items->id }}">{{ $items->nama_ruang }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="id_agama">Nama Agama</label>
                                        <select class="form-control" id="id_agama" name="id_agama">
                                            <option value="">Pilih Nama Agama</option>
                                            @foreach ($agama as $items)
                                                <option value="{{ $items->id }}">{{ $items->nama_agama }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="id_tp">Tahun Pelajaran</label>
                                        <select class="form-control" id="id_tp" name="id_tp">
                                            <option value="">Pilih Tahun Pelajaran</option>
                                            @foreach ($tp as $items)
                                                <option value="{{ $items->id }}">{{ $items->tahun_pelajaran }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>











                                    <!-- End Browser Default Validation -->

                            </div>

                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary rounded-pill px-4 " style="font-size: 0.75rem"
                        data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="simpan" value="simpan" class="btn btn-primary rounded-pill px-4 "
                        style="font-size: 0.75rem">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <?php 
  $no=1;
  foreach ($data as  $value) {
    # code...
  ?>
    <div class="modal fade" id="editModal{{ $value->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg ">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit siswa Sekolah</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-lg-12">


                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"></h5>

                                <!-- Browser Default Validation -->

                                <form method="POST" action="/updateSiswa" class="row g-3"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $value->id }}">
                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-2 col-form-label">NIS </label>
                                        <div class="col-sm-10">
                                            <input type="text" name="nis" value="{{ $value->nis }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-2 col-form-label">NISN Siswa</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="nisn" value="{{ $value->nisn }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-2 col-form-label">Nama Siswa</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="nama_siswa" value="{{ $value->nama_siswa }}"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="inputUsername" class="col-sm-2 col-form-label">Username</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="username" value="{{ $value->username }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                                        <div class="col-sm-10">
                                            <input type="password" name="password" value="{{ $value->password }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" name="email" value="{{ $value->email }}"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <fieldset class="row mb-3">
                                        <legend class="col-form-label col-sm-2 pt-0">Aktif</legend>
                                        <div class="col-sm-10">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="aktif"
                                                    id="gridRadios1" value="Y" checked>
                                                <label class="form-check-label" for="gridRadios1">
                                                    Aktif
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="aktif"
                                                    id="gridRadios2" value="N">
                                                <label class="form-check-label" for="gridRadios2">
                                                    Tidak Aktif
                                                </label>
                                            </div>

                                            <div class="form-group">
                                                <label for="gambar">Gambar</label>
                                                <input type="file" class="form-control" id="gambar"
                                                    name="gambar">
                                                <input class=" form-control" type="hidden" name="gambarLama"
                                                    value="{{ $value->gambar }}">
                                            </div>
                                        </div>
                                    </fieldset>

                                    <div class="form-group">
                                        <input type="hidden" class="form-control" id="id" name="id"
                                            value="{{ $value->id }}">
                                        <label for="id_level">Nama Level</label>
                                        <select class="form-control" id="id_level" name="id_level">
                                            <option value="{{ $value->id_level }}">
                                                {{ $value->level->nama_level }}
                                            </option>
                                            @foreach ($level as $items)
                                                <option value="{{ $items->id }}">{{ $items->nama_level }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <input type="hidden" class="form-control" id="id" name="id"
                                            value="{{ $value->id }}">
                                        <label for="id_kelas">Nama Kelas</label>
                                        <select class="form-control" id="id_kelas" name="id_kelas">
                                            <option value="{{ $value->id_kelas }}">
                                                {{ $value->kelas->nama_kelas }}
                                            </option>
                                            @foreach ($kelas as $items)
                                                <option value="{{ $items->id }}">{{ $items->nama_kelas }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <input type="hidden" class="form-control" id="id" name="id"
                                            value="{{ $value->id }}">
                                        <label for="id_jurusan">Nama Jurusan</label>
                                        <select class="form-control" id="id_jurusan" name="id_jurusan">
                                            <option value="{{ $value->id_jurusan }}">
                                                {{ $value->jurusan->nama_jurusan }}
                                            </option>
                                            @foreach ($jurusan as $items)
                                                <option value="{{ $items->id }}">{{ $items->nama_jurusan }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <input type="hidden" class="form-control" id="id" name="id"
                                            value="{{ $value->id }}">
                                        <label for="id_ruang">Nama Ruang</label>
                                        <select class="form-control" id="id_ruang" name="id_ruang">
                                            <option value="{{ $value->id_ruang }}">
                                                {{ $value->ruang->nama_ruang }}
                                            </option>
                                            @foreach ($ruang as $items)
                                                <option value="{{ $items->id }}">{{ $items->nama_ruang }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <input type="hidden" class="form-control" id="id" name="id"
                                            value="{{ $value->id }}">
                                        <label for="id_agama">Nama Agama</label>
                                        <select class="form-control" id="id_agama" name="id_agama">
                                            <option value="{{ $value->id_agama }}">
                                                {{ $value->agama->nama_agama }}
                                            </option>
                                            @foreach ($agama as $items)
                                                <option value="{{ $items->id }}">{{ $items->nama_agama }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <input type="hidden" class="form-control" id="id" name="id"
                                            value="{{ $value->id }}">
                                        <label for="id_tp">Tahun Pelajaran</label>
                                        <select class="form-control" id="id_tp" name="id_tp">
                                            <option value="{{ $value->id_tp }}">
                                                {{ $value->tp->tahun_pelajaran }}
                                            </option>
                                            @foreach ($tp as $items)
                                                <option value="{{ $items->id }}">{{ $items->tahun_pelajaran }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- End Browser Default Validation -->

                            </div>

                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary rounded-pill px-4 " style="font-size: 0.75rem"
                        data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="update" class="btn btn-primary rounded-pill px-4 "
                        style="font-size: 0.75rem">Update</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <?php } ?>


    <div class="modal fade" id="modal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/importexcel" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-grup">
                            <input type="file" name="file" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
            </div>
            </form>
        </div>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
            integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <Script>
            @if (Session::has('success'))
                toastr.success("{{ Session::get('success') }}")
            @endif
        </script>
    </div>
@endsection
