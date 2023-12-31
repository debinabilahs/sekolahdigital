@extends('admin.dashboard')
@section('akademik', 'collapsed')
@section('pageTitle', 'Paket Soal')
@section('breadcrumb')
    @include('partials.breadcrumbs', ['breadcrumbs' => ['Paket Soal']])
@endsection
@section('content')
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        {{-- Data Tables --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="card-title inline-block">Data Paket</h5>
                            </div>
                            <div>
                                <button class="btn btn-primary rounded-pill px-4" style="font-size: 0.9rem"
                                    data-bs-toggle="modal" data-bs-target="#modalpaket"> + Paket</button>
                            </div>
                        </div>
                        <hr>
                        {{-- <form class="search-form d-flex justify-content-end position-relative" method="POST"
                            action="#">
                            <input type="text" name="query" placeholder="Search" title="Enter search keyword"
                                class="outline-none rounded-pill border px-3 h-5" style="outline: none;">
                            <button type="submit" title="Search"
                                class="bg-primary position-absolute top-0 right-0 text-white rounded- border-0 h-100 px-2"
                                style="border-radius: 0 50% 50% 0;"><i class="bi bi-search"></i></button>
                        </form> --}}
                        <!-- Table with hoverable rows -->
                        <table class="table table-hover" id="example">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama paket</th>
                                    <th scope="col">Mata Pelajaran</th>
                                    <th scope="col">Kelas</th>
                                    <th scope="col">Kode Paket</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                  $no=1;
                  foreach ($data as  $value) {
                    # code...
                  ?>
                                <tr>
                                    <td scope="row">{{ $no }}</td>
                                    <td>{{ $value->nama }} </td>
                                    <td>{{ $value->mapel->nama_mapel }} </td>
                                    <td>{{ $value->kelas->nama_kelas }} </td>
                                    <td>{{ $value->kode_paket }} </td>

                                    <td>                                       
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#detailpaketModal{{ $value->id }}">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                        <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                            data-bs-target="#editModal{{ $value->id }}"><i
                                                class="bi bi-pencil"></i></button>
                                        <a href="/hapuspaket/{{ $value->id }}" button type="button"
                                            class="btn btn-danger"
                                            onClick="return confirm('Yakin akan menghapus data ini!')"><i
                                                class="bi bi-trash"></i></button></a>
                                    </td>
                                </tr>

                                <?php $no++; } ?>

                            </tbody>
                        </table>
                        <!-- End Table with hoverable rows -->

                    </div>
                </div>


            </div>
        </div>
    </section>

    <!-- Modal -->
    {{-- Tambah paket --}}
    <div class="modal fade" id="modalpaket" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Form Input Paket </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-lg-12">


                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"></h5>

                                <!-- Browser Default Validation -->

                                <form method="POST" action="/prosespaket" class="row g-3">
                                    @csrf


                                    <div class="col-md-12">
                                        <label for="nama" class="form-label">Nama Paket</label>
                                        <input type="text" name="nama" class="form-control" id="nama"
                                            hint="nama" placeholder="Masukkan Nama Paket" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="id_kelas">Nama Kelas</label>
                                        <select class="form-control" id="id_kelas" name="id_kelas">
                                            <option value="">Pilih Nama kelas</option>
                                            @foreach ($kelas as $items)
                                                <option value="{{ $items->id }}">{{ $items->nama_kelas }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="id_mapel">Nama Mapel</label>
                                        <select class="form-control" id="id_mapel" name="id_mapel">
                                            <option value="" data-kelas="">Pilih Nama Mapel</option>
                                            @foreach ($mapel as $items)
                                                <option value="{{ $items->id }}" data-kelas="{{ $items->id_kelas}}">{{ $items->nama_mapel }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-12">
                                        <label for="keterangan" class="form-label">Keterangan</label>
                                        <input type="text" name="keterangan" class="form-control" id="keterangan"
                                            hint="keterangan" placeholder="Masukkan Keterangan" required>
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

    <!-- Modal Detail paket -->
    <?php 
  $no=1;
  foreach ($data as  $value) {
    # code...
  ?>
    <div class="modal fade" id="detailpaketModal{{ $value->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Paket</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-lg-12">


                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"></h5>

                                <!-- Browser Default Validation -->

                                <form method="POST" action="/lihatpaket" class="row g-3">
                                    @csrf
                                    <table class="table table-hover">
                                        <tr>
                                            <th scope="col">Nama Paket</th>
                                            <td>{{ $value->nama }} </td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Mata Pelajaran</th> 
                                            <td>{{ $value->mapel->nama_mapel }} </td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Kelas</th>
                                            <td>{{ $value->kelas->nama_kelas }} </td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Kode Paket</th>
                                            <td>{{ $value->kode_paket }} </td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Keterangan</th>
                                            <td>{{ $value->keterangan }} </td>
                                        </tr>
                                    
                                    </table>
                                    <!-- End Browser Default Validation -->

                            </div>

                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary rounded-pill px-4 " style="font-size: 0.75rem"
                        data-bs-dismiss="modal">Close</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <?php } ?>


    {{-- Edit paket --}}
    <?php 
  $no=1;
  foreach ($data as  $value) {
    # code...
  ?>
    <div class="modal fade" id="editModal{{ $value->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Paket</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-lg-12">


                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"></h5>

                                <!-- Browser Default Validation -->

                                <form method="POST" action="/updatepaket" class="row g-3">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $value->id }}">


                                    <div class="col-md-12">
                                        <label for="validationDefault01" class="form-label">Nama Paket</label>
                                        <input type="text" name="nama" value="{{ $value->nama }}"
                                            class="form-control" id="nama" hint="nama" required>
                                    </div>

                                    <div class="form-group">
                                        <input type="hidden" class="form-control" id="id" name="id"
                                            value="{{ $value->id }}">
                                        <label for="id_mapel">Nama Mapel</label>
                                        <select class="form-control" id="id_mapel" name="id_mapel">
                                            <option value="{{ $value->id_mapel }}">
                                                {{ $value->mapel->nama_mapel }}
                                            </option>
                                            @foreach ($mapel as $items)
                                                <option value="{{ $items->id }}">{{ $items->nama_mapel }}
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

                                    <div class="col-md-12">
                                        <label for="keterangan" class="form-label">Keterangan</label>
                                        <input type="text" name="keterangan" value="{{ $value->keterangan }}" class="form-control" id="keterangan"
                                            hint="keterangan" required>
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
                toastr.success("{{ Session::get('success') }}");
            @endif
        </script>
        <script>
            $(document).ready(function () {
                // Ketika dropdown "Kelas" berubah
                $("#id_kelas").change(function () {
                    // Ambil nilai yang dipilih
                    var selectedKelas = $(this).val();

                    // Sembunyikan semua opsi pada dropdown "Mata Pelajaran"
                    $("#id_mapel option").hide();

                    // Tampilkan hanya opsi yang sesuai dengan kelas yang dipilih
                    $("#id_mapel option[data-kelas='" + selectedKelas + "']").show();
                    
                    // Pilih opsi pertama
                    $("#id_mapel").val($("#id_mapel option[data-kelas='" + selectedKelas + "']:first").val());
                });
            });
        </script>
    </div>
    {{-- Data Tables --}}
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

    <script>
        new DataTable('#example');
    </script>
@endsection
