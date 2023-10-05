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
                                <h5 class="card-title inline-block">Data Sekolah</h5>
                            </div>
                            <div>
                                <button class="btn btn-danger rounded-pill px-4" style="font-size: 0.75rem"
                                    data-bs-toggle="modal" data-bs-target="#modal2">Import Excel</button>
                                <button class="btn btn-primary rounded-pill px-4" style="font-size: 0.9rem"
                                    data-bs-toggle="modal" data-bs-target="#modalsekolah"> + Sekolah</button>
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
                                        <th scope="col">Npsn</th>
                                        <th scope="col">NamaSekolah</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">NoTelepon</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Maps</th>
                                        <th scope="col">NamaKepsek</th>
                                        <th scope="col">NipKepsek</th>
                                        <th scope="col">LogoKepsek</th>
                                        <th scope="col">AktifSekolah</th>
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
                                        <td>{{ $value->npsn }} </td>
                                        <td>{{ $value->nama_sekolah }} </td>
                                        <td>{{ $value->alamat }} </td>
                                        <td>{{ $value->no_telp }} </td>
                                        <td>{{ $value->email }} </td>
                                        <td>{{ $value->maps }} </td>
                                        <td>{{ $value->nama_kepalasekolah }} </td>
                                        <td>{{ $value->nip_kepsek }} </td>

                                        <td><img src=" {{ asset('logokepsek/' . $value->logo_kepsek) }}" alt=""
                                                width="40px" height="40px" class="rounded-circle">
                                            <style>
                                                tr td img {
                                                    margin-left: 25px;
                                                }
                                            </style>
                                        </td>
                                        <td>{{ $value->aktif_sekolah }} </td>
                                        <td>
                                            <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                                data-bs-target="#editModal{{ $value->id }}"><i
                                                    class="bi bi-pencil"></i></button>
                                            <a href="/hapusSekolah/{{ $value->id }}" button type="button"
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
    <div class="modal fade" id="modalsekolah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg ">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Form Input sekolah </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-lg-12">


                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"></h5>

                                <!-- Browser Default Validation -->

                                <form method="POST" action="/prosesSekolah" class="row g-3" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-2 col-form-label">Npsn</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="npsn" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-2 col-form-label">Nama Sekolah</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="nama_sekolah" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputEmail" class="col-sm-2 col-form-label">Alamat</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="alamat" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputTime" class="col-sm-2 col-form-label">No Telp</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="no_telp" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputDate" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" name="email" class="form-control">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="inputNumber" class="col-sm-2 col-form-label">Maps</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="maps" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputUsername" class="col-sm-2 col-form-label">Nama Kepsek</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="nama_kepalasekolah" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Nip Kepsek</label>
                                        <div class="col-sm-10">
                                            <input type="number" name="nip_kepsek" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="logo_kepsek" class="col-sm-2 col-form-label">Logo Kepsek</label>
                                        <div class="col-sm-10">
                                            <input type="file" class="form-control" id="logo_kepsek"
                                                name="logo_kepsek">
                                        </div>
                                    </div>

                                    <fieldset class="row mb-3">
                                        <legend class="col-form-label col-sm-2 pt-0">Aktif Sekolah</legend>
                                        <div class="col-sm-10">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="aktif_sekolah"
                                                    id="gridRadios1" value="Y" checked>
                                                <label class="form-check-label" for="gridRadios1">
                                                    Aktif
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="aktif_sekolah"
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit sekolah Sekolah</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-lg-12">


                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"></h5>

                                <!-- Browser Default Validation -->

                                <form method="POST" action="/updateSekolah" class="row g-3"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $value->id }}">
                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-2 col-form-label">Npsn</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="npsn" value="{{ $value->npsn }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-2 col-form-label">Nama Sekolah</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="nama_sekolah" value="{{ $value->nama_sekolah }}"
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
                                        <label for="inputNumber" class="col-sm-2 col-form-label">Maps</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="maps" value="{{ $value->maps }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputUsername" class="col-sm-2 col-form-label">Nama Kepsek</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="nama_kepalasekolah"
                                                value="{{ $value->nama_kepalasekolah }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Nip Kepsek</label>
                                        <div class="col-sm-10">
                                            <input type="number" name="nip_kepsek" class="form-control"
                                                value="{{ $value->nip_kepsek }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="foto" class="col-sm-2 col-form-label">Logo Kepsek</label>
                                        <input type="file" class="form-control" id="foto" name="logo_kepsek">
                                        <input class=" form-control" type="hidden" name="gambarLama"
                                            value="{{ $value->logo_kepsek }}">
                                    </div>
                                    <fieldset class="row mb-3">
                                        <legend class="col-form-label col-sm-2 pt-0">Aktif</legend>
                                        <div class="col-sm-10">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="aktif_sekolah"
                                                    id="gridRadios1" value="Y" checked>
                                                <label class="form-check-label" for="gridRadios1">
                                                    Aktif
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="aktif_sekolah"
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
