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
                                <h5 class="card-title inline-block">Data Soal</h5>
                            </div>
                            <div>
                                <button class="btn btn-danger rounded-pill px-4" style="font-size: 0.75rem"
                                    data-bs-toggle="modal" data-bs-target="#modal2">Import Excel</button>
                                <button class="btn btn-primary rounded-pill px-4" style="font-size: 0.9rem"
                                    data-bs-toggle="modal" data-bs-target="#modalsoal"> + Soal</button>
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
                                    <th scope="col">Exam</th>
                                    <th scope="col">Desk Soal</th>
                                    <th scope="col">Jawaban</th>
                                    <th scope="col">Opsi</th>
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
                                    <td>{{ $value->id_exam }} </td>
                                    <td>{{ $value->nama_mapel }} </td>
                                    <td>{{ $value->nama_guru }} </td>
                                    <td>{{ $value->desk_soal }} </td>
                                    <td>{{ $value->jawaban }} </td>
                                    <td>{{ $value->id_opsi }} </td>

                                    <td>
                                        <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                            data-bs-target="#editModal{{ $value->id }}"><i
                                                class="bi bi-pencil"></i></button>
                                        <a href="/hapussoal/{{ $value->id }}" button type="button"
                                            class="btn btn-danger" onClick="alert('Yakin akan menghapus data ini!')"><i
                                                class="bi bi-trash"></i></button></a>
                                    </td>
                                </tr>

                                <?php $no++; } ?>

                            </tbody>
                        </table>
                        {{ $data->links() }}
                        <!-- End Table with hoverable rows -->

                    </div>
                </div>


            </div>
        </div>
    </section>
    <!-- Modal -->
    <div class="modal fade" id="modalsoal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Form Input Soal </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-lg-12">


                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"></h5>

                                <!-- Browser Default Validation -->

                                <form method="POST" action="/prosessoal" class="row g-3">
                                    @csrf


                                    <div class="col-md-12">
                                        <label for="validationDefault01" class="form-label">Exam</label>
                                        <select class="form-select" aria-label="Default select example" name="id_mapel">
                                            <option selected="">Pilih Mapel</option>
                                            <?php $data21 = DB::select('select * From rs_mapel');
                            foreach($data21 as $r){
                            ?>
                                            <option value="{{ $r->id }}">{{ $r->nama_mapel }}</option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <select class="form-select" aria-label="Default select example" name="id_guru">
                                            <option selected="">Pilih Guru</option>
                                            <?php $data21 = DB::select('select * From rs_guru');
                            foreach($data21 as $r){
                            ?>
                                            <option value="{{ $r->id }}">{{ $r->nama_guru }}</option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="col-md-12">
                                        <label for="validationDefault01" class="form-label">DeskSoal</label>
                                        <input type="text" name="desk_soal" class="form-control" id="validationDefault01"
                                            hint="desk_soal" required>
                                    </div>

                                    <div class="col-md-12">
                                        <label for="validationDefault01" class="form-label">Jawaban</label>
                                        <input type="text" name="jawaban" class="form-control" id="validationDefault01"
                                            hint="jawaban" required>
                                    </div>


                                    <div class="col-md-12">
                                        <label for="validationDefault01" class="form-label">Opsi</label>
                                        <select class="form-select" aria-label="Default select example" name="pil_A">
                                            <option selected="">Pil A</option>
                                            <?php $data21 = DB::select('select * From rs_opsi');
                            foreach($data21 as $r){
                            ?>
                                            <option value="{{ $r->id }}">{{ $r->pil_A }}</option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <select class="form-select" aria-label="Default select example" name="pil_B">
                                            <option selected="">Pil B</option>
                                            <?php $data21 = DB::select('select * From rs_opsi');
                            foreach($data21 as $r){
                            ?>
                                            <option value="{{ $r->id }}">{{ $r->pil_B }}</option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <select class="form-select" aria-label="Default select example" name="pil_C">
                                            <option selected="">Pil C</option>
                                            <?php $data21 = DB::select('select * From rs_opsi');
                            foreach($data21 as $r){
                            ?>
                                            <option value="{{ $r->id }}">{{ $r->pil_C }}</option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <select class="form-select" aria-label="Default select example" name="pil_D">
                                            <option selected="">Pil D</option>
                                            <?php $data21 = DB::select('select * From rs_opsi');
                            foreach($data21 as $r){
                            ?>
                                            <option value="{{ $r->id }}">{{ $r->pil_D }}</option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <select class="form-select" aria-label="Default select example" name="pil_E">
                                            <option selected="">Pil E</option>
                                            <?php $data21 = DB::select('select * From rs_opsi');
                            foreach($data21 as $r){
                            ?>
                                            <option value="{{ $r->id }}">{{ $r->pil_E }}</option>
                                            <?php } ?>
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit pangkal Sekolah</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-lg-12">


                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"></h5>

                                <!-- Browser Default Validation -->

                                <form method="POST" action="/prosessoal" class="row g-3">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $value->id }}">

                                    <div class="col-md-12">
                                        <label for="validationDefault01" class="form-label">Mapel</label>
                                        <select class="form-select" aria-label="Default select example" name="id_mapel">
                                            <option value="{{ $value->id_mapel }}" selected="">
                                                {{ $value->nama_mapel }}</option>
                                            <option>Pilih Mapel</option>
                                            <?php $data21 = DB::select('select * From rs_mapel');
                              foreach($data21 as $r){
                              ?>
                                            <option value="{{ $r->id }}">{{ $r->nama_mapel }}</option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <select class="form-select" aria-label="Default select example" name="id_guru">
                                            <option value="{{ $value->id_guru }}" selected="">{{ $value->nama_guru }}
                                            </option>
                                            <option>Pilih Guru</option>
                                            <?php $data21 = DB::select('select * From rs_guru');
                              foreach($data21 as $r){
                              ?>
                                            <option value="{{ $r->id }}">{{ $r->nama_guru }}</option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="col-md-12">
                                        <label for="validationDefault01" class="form-label">DeskSoal</label>
                                        <input value="{{ $value->desk_soal }}"type="text" name="desk_soal"
                                            class="form-control" id="validationDefault01" hint="desk_soal" required>
                                    </div>

                                    <div class="col-md-12">
                                        <label for="validationDefault01" class="form-label">Jawaban</label>
                                        <input value="{{ $value->jawaban }}"type="text" name="jawaban"
                                            class="form-control" id="validationDefault01" hint="jawaban" required>
                                    </div>


                                    <div class="col-md-12">
                                        <label for="validationDefault01" class="form-label">Opsi</label>
                                        <select class="form-select" aria-label="Default select example" name="pil_A">
                                            <option value="{{ $r->id_opsi }}" selected="">{{ $value->pil_A }}
                                            </option>
                                            <?php $data21 = DB::select('select * From rs_opsi');
                            foreach($data21 as $r){
                            ?>
                                            <option value="{{ $r->id }}">{{ $r->pil_A }}</option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <select class="form-select" aria-label="Default select example" name="pil_B">
                                            <option value="{{ $r->id_opsi }}" selected="">{{ $value->pil_B }}
                                            </option>
                                            <?php $data21 = DB::select('select * From rs_opsi');
                            foreach($data21 as $r){
                            ?>
                                            <option value="{{ $r->id }}">{{ $r->pil_B }}</option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <select class="form-select" aria-label="Default select example" name="pil_C">
                                            <option value="{{ $r->id_opsi }}" selected="">{{ $value->pil_C }}
                                            </option>
                                            <?php $data21 = DB::select('select * From rs_opsi');
                            foreach($data21 as $r){
                            ?>
                                            <option value="{{ $r->id }}">{{ $r->pil_C }}</option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <select class="form-select" aria-label="Default select example" name="pil_D">
                                            <option value="{{ $r->id_opsi }}" selected="">{{ $value->pil_D }}
                                            </option>
                                            <?php $data21 = DB::select('select * From rs_opsi');
                            foreach($data21 as $r){
                            ?>
                                            <option value="{{ $r->id }}">{{ $r->pil_D }}</option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <select class="form-select" aria-label="Default select example" name="pil_E">
                                            <option value="{{ $r->id_opsi }}" selected="">{{ $value->pil_E }}
                                            </option>
                                            <?php $data21 = DB::select('select * From rs_opsi');
                            foreach($data21 as $r){
                            ?>
                                            <option value="{{ $r->idss }}">{{ $r->pil_E }}</option>
                                            <?php } ?>
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