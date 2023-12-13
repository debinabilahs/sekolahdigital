@extends('admin.dashboard')
@section('master-data', 'collapsed')
@section('pageTitle', 'User')
@section('breadcrumb')
    @include('partials.breadcrumbs', ['breadcrumbs' => ['User']])
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
                                <h5 class="card-title inline-block">Data User</h5>
                            </div>
                            <div>
                                <button class="btn btn-primary rounded-pill px-4" style="font-size: 0.9rem"
                                    data-bs-toggle="modal" data-bs-target="#modalUser"> + User</button>
                            </div>
                        </div>
                        <hr>
                        {{-- <form class="search-form d-flex justify-content-end position-relative" method="GET"
                            action="{{ route ('user')}}">
                            <input type="text" name="search" placeholder="Search" value="{{ $request->get('search') }}" title="Enter search keyword"
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
                                    <th scope="col">Username</th>
                                    <th scope="col">Namalengkap</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">NoHp</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Level</th>
                                    <th scope="col">Blokir</th>
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
                                    <td>{{ $value->username }} </td>
                                    <td>{{ $value->name }} </td>
                                    <td>{{ $value->email }} </td>
                                    <td>{{ $value->no_hp }} </td>
                                    <td>{{ $value->status }} </td>
                                    <td>{{ $value->level }} </td>
                                    <td>{{ $value->blokir }} </td>

                                    <td>
                                        <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                            data-bs-target="#editModal{{ $value->id }}"><i
                                                class="bi bi-pencil"></i></button>
                                        <a href="/hapususer/{{ $value->id }}" button type="button"
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
                    <!-- pagination -->
                </div>
            </div>
        </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="modalUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Form Input User </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-lg-12">


                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"></h5>

                                <!-- Browser Default Validation -->

                                <form method="POST" action="/prosesuser" class="row g-3">
                                    @csrf
                                    <div class="col-md-12">
                                        <label for="validationDefault01" class="form-label"> Username</label>
                                        <input type="text" name="username" class="form-control" id="validationDefault01"
                                            hint="username" placeholder="Masukkan Username" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="validationDefault01" class="form-label">Nama Lengkap</label>
                                        <input type="text" name="name" class="form-control"
                                            id="validationDefault01" hint="name" placeholder="Masukkan Nama Lengkap" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="validationDefault01" class="form-label"> Email</label>
                                        <input type="email" name="email" class="form-control" id="validationDefault01"
                                            hint="email" placeholder="Masukkan Email" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="validationDefault01" class="form-label"> No Hp</label>
                                        <input type="text" name="no_hp" class="form-control"
                                            id="validationDefault01" hint="no_hp" placeholder="Masukkan No HP" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="validationDefault01" class="form-label"> Status</label>
                                        <input type="text" name="status" class="form-control"
                                            id="validationDefault01" hint="status" placeholder="Masukkan Status" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="validationDefault01" class="form-label"> Level</label>
                                        <select type="text" name="level" class="form-control">
                                            <option value="">Pilih Level</option>
                                            <option value="1">admin</option>
                                            <option value="2">guru</option>
                                            <option value="3">siswa</option>
                                        </select>
                                    </div>

                                    <fieldset class="row mb-3">
                                        <legend class="col-form-label col-sm-2 pt-0">Blokir</legend>
                                        <div class="col-sm-10">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="blokir"
                                                    id="gridRadios1" value="Y" checked>
                                                <label class="form-check-label" for="gridRadios1">
                                                    Y
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="blokir"
                                                    id="gridRadios2" value="N">
                                                <label class="form-check-label" for="gridRadios2">
                                                    N
                                                </label>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <div class="col-md-12">
                                        <label for="validationDefault01" class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control"
                                            id="validationDefault01" hint="password" placeholder="Masukkan Password" required>
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit User Sekolah</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-lg-12">


                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"></h5>

                                <!-- Browser Default Validation -->

                                <form method="POST" action="/updateuser" class="row g-3">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $value->id }}">
                                    <div class="col-md-12">
                                        <label for="validationDefault01" class="form-label"> Username</label>
                                        <input type="text" name="username"
                                            value="{{ $value->username }}"class="form-control" id="validationDefault01"
                                            hint="username" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="validationDefault01" class="form-label">Nama Lengkap</label>
                                        <input type="text" name="name" value="{{ $value->name }}"
                                            class="form-control" id="validationDefault01" hint="Nama lengkap" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="validationDefault01" class="form-label"> Email</label>
                                        <input type="email" name="email" value="{{ $value->email }}"
                                            class="form-control" id="validationDefault01" hint="email" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="validationDefault01" class="form-label"> No Hp</label>
                                        <input type="text" name="no_hp" value="{{ $value->no_hp }}"
                                            class="form-control" id="validationDefault01" hint="no_hp" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="validationDefault01" class="form-label"> Status</label>
                                        <input type="text" name="status" value="{{ $value->status }}"
                                            class="form-control" id="validationDefault01" hint="status" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="validationDefault01" class="form-label"> Level</label>

                                        <select class="form-control" id="level" name="level">
                                            <option value="{{ $value->id_user }}">
                                                {{ $value->level }}
                                            </option>
                                            @foreach ($user as $items)
                                                <option value="{{ $items->id }}">{{ $items->level }}</option>
                                            @endforeach
                                        </select>
                                        
                                    </div>

                                    <fieldset class="row mb-3">
                                        <legend class="col-form-label col-sm-2 pt-0">Blokir</legend>
                                        <div class="col-sm-10">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="blokir" id="gridRadios1" value="Y" {{ $value->blokir === 'Y' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="gridRadios2">
                                                    Y
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="blokir" id="gridRadios2" value="N" {{ $value->blokir === 'N' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="gridRadios2">
                                                    N
                                                </label>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <div class="col-md-12">
                                        
                                            <label for="validationDefault01" class="form-label">Password</label>
                                            <input type="text" name="password" value="" class="form-control" id="validationDefault01" placeholder="********" readonly>
                                        
                                        
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

    {{-- Data Tables --}}
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

    <script>
        new DataTable('#example');
    </script>
@endsection
