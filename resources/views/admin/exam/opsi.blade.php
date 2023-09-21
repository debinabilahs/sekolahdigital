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
                                <h5 class="card-title inline-block">Data Opsi</h5>
                            </div>
                            <div>
                                <button class="btn btn-danger rounded-pill px-4" style="font-size: 0.75rem"
                                    data-bs-toggle="modal" data-bs-target="#modal2">Import Excel</button>
                                <button class="btn btn-primary rounded-pill px-4" style="font-size: 0.9rem"
                                    data-bs-toggle="modal" data-bs-target="#modalopsi"> + Opsi</button>
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
                                    <th scope="col">Pil_A</th>
                                    <th scope="col">Pil_B</th>
                                    <th scope="col">Pil_C</th>
                                    <th scope="col">Pil_D</th>
                                    <th scope="col">Pil_E</th>
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
                                    <td>{{ $value->pil_A }} </td>
                                    <td>{{ $value->pil_B }} </td>
                                    <td>{{ $value->pil_C }} </td>
                                    <td>{{ $value->pil_D }} </td>
                                    <td>{{ $value->pil_E }} </td>
                                    <td>
                                        <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                            data-bs-target="#editModal{{ $value->id_opsi }}"><i
                                                class="bi bi-pencil"></i></button>
                                        <a href="/hapusopsi/{{ $value->id_opsi }}" button type="button"
                                            class="btn btn-danger" onClick="alert('Yakin akan menghapus data ini!')"><i
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
    <div class="modal fade" id="modalopsi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Form Input Opsi </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-lg-12">


                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"></h5>

                                <!-- Browser Default Validation -->

                                <form method="POST" action="/prosesopsi" class="row g-3">
                                    @csrf
                                    <div class="col-md-12">
                                        <label for="validationDefault01" class="form-label">Opsi_A</label>
                                        <input type="text" name="pil_A" class="form-control" id="validationDefault01"
                                            hint="pil_A" required>
                                    </div>

                                    <div class="col-md-12">
                                        <label for="validationDefault01" class="form-label">Opsi_B</label>
                                        <input type="text" name="pil_B" class="form-control" id="validationDefault01"
                                            hint="pil_B" required>
                                    </div>

                                    <div class="col-md-12">
                                        <label for="validationDefault01" class="form-label">Opsi_C</label>
                                        <input type="text" name="pil_C" class="form-control" id="validationDefault01"
                                            hint="pil_C" required>
                                    </div>

                                    <div class="col-md-12">
                                        <label for="validationDefault01" class="form-label">Opsi_D</label>
                                        <input type="text" name="pil_D" class="form-control" id="validationDefault01"
                                            hint="pil_D" required>
                                    </div>

                                    <div class="col-md-12">
                                        <label for="validationDefault01" class="form-label">Opsi_E</label>
                                        <input type="text" name="pil_E" class="form-control"
                                            id="validationDefault01" hint="pil_E" required>
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
    <div class="modal fade" id="editModal{{ $value->id_opsi }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Opsi</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-lg-12">


                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"></h5>

                                <!-- Browser Default Validation -->

                                <form method="POST" action="/prosesopsi" class="row g-3">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $value->id_opsi }}">
                                    <div class="col-md-12">
                                        <label for="validationDefault01" class="form-label">Pil_A</label>
                                        <input type="text" name="pil_A" value="{{ $value->pil_A }}"
                                            class="form-control" id="validationDefault01" hint="pil_A" required>
                                    </div>

                                    <div class="col-md-12">
                                        <label for="validationDefault01" class="form-label">Pil_B</label>
                                        <input type="text" name="pil_B" value="{{ $value->pil_B }}"
                                            class="form-control" id="validationDefault01" hint="pil_B" required>
                                    </div>

                                    <div class="col-md-12">
                                        <label for="validationDefault01" class="form-label">Pil_C</label>
                                        <input type="text" name="pil_C" value="{{ $value->pil_C }}"
                                            class="form-control" id="validationDefault01" hint="pil_C" required>
                                    </div>

                                    <div class="col-md-12">
                                        <label for="validationDefault01" class="form-label">Pil_D</label>
                                        <input type="text" name="pil_D" value="{{ $value->pil_D }}"
                                            class="form-control" id="validationDefault01" hint="pil_D" required>
                                    </div>

                                    <div class="col-md-12">
                                        <label for="validationDefault01" class="form-label">Pil_E</label>
                                        <input type="text" name="pil_E" value="{{ $value->pil_E }}"
                                            class="form-control" id="validationDefault01" hint="pil_E" required>
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
