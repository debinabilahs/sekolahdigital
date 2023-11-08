@extends('admin.dashboard')
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
                                <h5 class="card-title inline-block">Data Admin</h5>
                            </div>
                            <div>
                                <button class="btn btn-danger rounded-pill px-4" style="font-size: 0.75rem"
                                    data-bs-toggle="modal" data-bs-target="#modal2">Import Excel</button>
                                <button class="btn btn-primary rounded-pill px-4" style="font-size: 0.9rem"
                                    data-bs-toggle="modal" data-bs-target="#modaladmin"> + Admin</button>
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
                                        <th scope="col">Nik</th>
                                        <th scope="col">NamaAdmin</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">NoTelepon</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">Password</th>
                                        <th scope="col">Foto</th>
                                        <th scope="col">AktifAdmin</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                  $no=1;
                  foreach ($data as $index => $value) {
                    # code...
                  ?>
                                    <tr>
                                        <td scope="row">{{ $index + $data->firstItem() }}</td>
                                        <td>{{ $value->nik }} </td>
                                        <td>{{ $value->nama_admin }} </td>
                                        <td>{{ $value->alamat }} </td>
                                        <td>{{ $value->no_telp }} </td>
                                        <td>{{ $value->email }} </td>
                                        <td>{{ $value->username }} </td>
                                        <td>{{ $value->password }} </td>

                                        <td><img src=" {{ asset('foto/' . $value->foto) }}" alt=""
                                                width="40px" height="40px" class="rounded-circle">
                                            <style>
                                                tr td img {
                                                    margin-left: 25px;
                                                }
                                            </style>
                                        </td>
                                        <td>{{ $value->aktif_admin }} </td>
                                        <td>
                                            <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                                data-bs-target="#editModal{{ $value->id }}"><i
                                                    class="bi bi-pencil"></i></button>
                                            <a href="/hapusAdmin/{{ $value->id }}" button type="button"
                                                class="btn btn-danger"
                                                onClick="return confirm('Yakin akan menghapus data ini!')"><i
                                                    class="bi bi-trash"></i></button></a>
                                        </td>
                                    </tr>

                                    <?php $no++; } ?>
                                </tbody>
                            </table>
                        </div>
                        {{ $data->links() }}
                        <!-- End Table with hoverable rows -->

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Modal -->
    <div class="modal fade" id="modaladmin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg ">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Form Input Admin </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-lg-12">


                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"></h5>

                                <!-- Browser Default Validation -->

                                <form method="POST" action="/prosesAdmin" class="row g-3" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-2 col-form-label">NIK</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="nik" class="form-control" placeholder="Masukkan NIK">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-2 col-form-label">Nama Admin</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="nama_admin" class="form-control" placeholder="Masukkan Nama Admin">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputEmail" class="col-sm-2 col-form-label">Alamat</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="alamat" class="form-control" placeholder="Masukkan Alamat">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputTime" class="col-sm-2 col-form-label">No Telp</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="no_telp" class="form-control" placeholder="Masukkan No Telp">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputDate" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" name="email" class="form-control" placeholder="Masukkan Email">
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
                                            <input type="number" name="password" class="form-control" placeholder="Masukkan Password">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                                        <div class="col-sm-10">
                                            <input type="file" class="form-control" id="foto"
                                                name="foto">
                                        </div>
                                    </div>

                                    <fieldset class="row mb-3">
                                        <legend class="col-form-label col-sm-2 pt-0">Aktif Admin</legend>
                                        <div class="col-sm-10">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="aktif_admin"
                                                    id="gridRadios1" value="Y" checked>
                                                <label class="form-check-label" for="gridRadios1">
                                                    Aktif
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="aktif_admin"
                                                    id="gridRadios2" value="N">
                                                <label class="form-check-label" for="gridRadios2">
                                                    Tidak Aktif
                                                </label>
                                            </div>
                                        </div>
                                    </fieldset>


                            </div>

                            <!-- End Browser Default Validation -->



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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Admin</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-lg-12">


                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"></h5>

                                <!-- Browser Default Validation -->

                                <form method="POST" action="/updateAdmin" class="row g-3"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $value->id }}">
                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-2 col-form-label">nik</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="nik" value="{{ $value->nik }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-2 col-form-label">Nama Admin</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="nama_admin" value="{{ $value->nama_admin }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputEmail" class="col-sm-2 col-form-label">Alamat</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="alamat" value="{{ $value->alamat }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputTime" class="col-sm-2 col-form-label">No Telp</label>
                                        <div class="col-sm-10">
                                            <input type="number" name="no_telp" value="{{ $value->no_telp }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputDate" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" name="email" value="{{ $value->email }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputUsername" class="col-sm-2 col-form-label">Username</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="username"
                                                value="{{ $value->username }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                                        <div class="col-sm-10">
                                            <input type="number" name="password" class="form-control"
                                                value="{{ $value->password }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                                        <input type="file" class="form-control" id="foto" name="foto">
                                        <input class=" form-control" type="hidden" name="gambarLama"
                                            value="{{ $value->foto }}">
                                    </div>
                                    <fieldset class="row mb-3">
                                        <legend class="col-form-label col-sm-2 pt-0">Aktif</legend>
                                        <div class="col-sm-10">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="aktif_admin"
                                                    id="gridRadios1" value="Y" checked>
                                                <label class="form-check-label" for="gridRadios1">
                                                    Aktif
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="aktif_admin"
                                                    id="gridRadios2" value="N">
                                                <label class="form-check-label" for="gridRadios2">
                                                    Tidak Aktif
                                                </label>
                                            </div>

                                        </div>
                                    </fieldset>

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
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
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
