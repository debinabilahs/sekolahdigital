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
                                <h5 class="card-title inline-block">Data Jadwal</h5>
                            </div>
                            <div>
                                <button class="btn btn-danger rounded-pill px-4" style="font-size: 0.75rem"
                                    data-bs-toggle="modal" data-bs-target="#modal2">Import Excel</button>
                                <button class="btn btn-primary rounded-pill px-4" style="font-size: 0.9rem"
                                    data-bs-toggle="modal" data-bs-target="#modaljadwal"> + Jadwal</button>
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
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Hari</th>
                                    <th scope="col">JamMulai</th>
                                    <th scope="col">JamSelesai</th>
                                    <th scope="col">Mapel</th>
                                    <th scope="col">Kelas</th>
                                    <th scope="col">Guru</th>
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
                                    <td>{{ $value->hari }} </td>
                                    <td>{{ $value->jam_mulai }} </td>
                                    <td>{{ $value->jam_selesai }} </td>
                                    <td>{{ $value->mapel->nama_mapel }} </td>
                                    <td>{{ $value->kelas->nama_kelas }} </td>
                                    <td>{{ $value->guru->nama_guru }} </td>

                                    <td>
                                        <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                            data-bs-target="#editModal{{ $value->id }}"><i
                                                class="bi bi-pencil"></i></button>
                                        <a href="/hapusjadwal/{{ $value->id }}" button type="button"
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
    <div class="modal fade" id="modaljadwal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Form Input Jadwal </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-lg-12">


                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"></h5>

                                <!-- Browser Default Validation -->

                                <form method="POST" action="/prosesjadwal" class="row g-3">
                                    @csrf


                                    <div class="col-md-12">
                                        <label for="hari" class="form-label">Hari</label>
                                        <input type="text" name="hari" class="form-control" id="hari"
                                            hint="hari" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="jam_mulai" class="form-label">JamMulai</label>
                                        <input type="time" name="jam_mulai" class="form-control" id="jam_mulai"
                                            hint="jam_mulai" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="jam_selesai" class="form-label">JamSelesai</label>
                                        <input type="time" name="jam_selesai" class="form-control" id="jam_selesai"
                                            hint="jam_selesai" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="id_mapel">Nama Mapel</label>
                                        <select class="form-control" id="id_mapel" name="id_mapel">
                                            <option value="">Pilih Nama Mapel</option>
                                            @foreach ($mapel as $items)
                                                <option value="{{ $items->id }}">{{ $items->nama_mapel }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="id_kelas">Nama kelas</label>
                                        <select class="form-control" id="id_kelas" name="id_kelas">
                                            <option value="">Pilih Nama kelas</option>
                                            @foreach ($kelas as $items)
                                                <option value="{{ $items->id }}">{{ $items->nama_kelas }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="id_guru">Nama guru</label>
                                        <select class="form-control" id="id_guru" name="id_guru">
                                            <option value="">Pilih Nama guru</option>
                                            @foreach ($guru as $items)
                                                <option value="{{ $items->id }}">{{ $items->nama_guru }}
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
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Jadwal</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-lg-12">


                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"></h5>

                                <!-- Browser Default Validation -->

                                <form method="POST" action="/updatejadwal" class="row g-3">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $value->id }}">


                                    <div class="col-md-12">
                                        <label for="validationDefault01" class="form-label">Hari</label>
                                        <input type="text" name="hari" value="{{ $value->hari }}"
                                            class="form-control" id="hari" hint="hari" required>
                                    </div>


                                    <div class="col-md-12">
                                        <label for="validationDefault01" class="form-label">JamMulai</label>
                                        <input type="time" name="jam_mulai" value="{{ $value->jam_mulai }}"
                                            class="form-control" id="jam_mulai" hint="jam_mulai" required>
                                    </div>


                                    <div class="col-md-12">
                                        <label for="validationDefault01" class="form-label">JamSelesai</label>
                                        <input type="time" name="jam_selesai" value="{{ $value->jam_selesai }}"
                                            class="form-control" id="jam_selesai" hint="jam_selesai" required>
                                    </div>

                                    <div class="form-group">
                                        <input type="hidden" class="form-control" id="id" name="id"
                                            value="{{ $value->id }}">
                                        <label for="id_mapel">Nama mapel</label>
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
                                        <label for="id_kelas">Nama kelas</label>
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
                                        <label for="id_guru">Nama guru</label>
                                        <select class="form-control" id="id_guru" name="id_guru">
                                            <option value="{{ $value->id_guru }}">
                                                {{ $value->guru->nama_guru }}
                                            </option>
                                            @foreach ($guru as $items)
                                                <option value="{{ $items->id }}">{{ $items->nama_guru }}
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