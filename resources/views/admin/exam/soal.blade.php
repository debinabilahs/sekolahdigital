@extends('admin.dashboard')
@section('akademik', 'collapsed')
@section('content')
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
    <style type="text/css">
        .ck-editor__editable_inline {
            height: 250px;
        }
    </style>
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
                                    <th scope="col">Nama Soal</th>
                                    <th scope="col">Paket Soal</th>
                                    <th scope="col">Mata Pelajaran</th>
                                    <th scope="col">Kelas</th>
                                    <th scope="col">Jenis</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
$no = 1;
foreach ($data as $value) {
    # code...
    ?>
                                <tr>
                                    <td scope="row">{{ $no }}</td>
                                    <td>{{ $value->nama }} </td>
                                    <td>{{ $value->paketsoal->kode_paket }} </td>
                                    <td>{{ $value->mapel->nama_mapel }} </td>
                                    <td>{{ $value->kelas->nama_kelas }} </td>
                                    <td>{{ $value->jenis }} </td>

                                    <td>
                                        <button id="openDetail" type="button" class="btn btn-primary"
                                            data-bs-toggle="modal" data-bs-target="#detailsoal{{ $value->id }}">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                        <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                            data-bs-target="#editModal{{ $value->id }}"><i
                                                class="bi bi-pencil"></i></button>
                                        <a href="/hapussoal/{{ $value->id }}" button type="button"
                                            class="btn btn-danger"
                                            onClick="return confirm('Yakin akan menghapus data ini!')"><i
                                                class="bi bi-trash"></i></button></a>
                                    </td>
                                </tr>

                                <?php $no++;}?>

                            </tbody>
                        </table>
                        <!-- End Table with hoverable rows -->

                    </div>
                </div>


            </div>
        </div>
    </section>

    <!-- Modal -->
    {{-- Tambah soal --}}
    <div class="modal fade" id="modalsoal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalsoal">Form Input Soal </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-lg-12">


                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"></h5>

                                <!-- Browser Default Validation -->

                                <form method="POST" id="form-tambah" action="/prosessoal" class="row g-3"
                                    enctype="multipart/form-data">
                                    @csrf


                                    <div class="card-header">
                                        <h4 class="card-title">Detail Soal</h4>
                                    </div>

                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label for="id_kelas">Kelas</label>
                                                    <select class="form-control" id="id_kelas" name="id_kelas">
                                                        <option value="">Pilih Nama kelas</option>
                                                        @foreach ($kelas as $items)
                                                            <option value="{{ $items->id }}">{{ $items->nama_kelas }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label for="id_mapel">Mata Pelajaran</label>
                                                    <select class="form-control" id="id_mapel" name="id_mapel">
                                                        <option value="">Pilih Nama Mapel</option>
                                                        @foreach ($mapel as $items)
                                                            <option value="{{ $items->id }}">{{ $items->nama_mapel }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label for="paket_soal_id">Paket Soal</label>
                                                    <select class="form-control" id="paket_soal_id" name="paket_soal_id">
                                                        <option value="">Pilih Kode Paket</option>
                                                        @foreach ($paketsoal as $items)
                                                            <option value="{{ $items->id }}">{{ $items->kode_paket }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label for="form-jenis">Jenis Soal</label>
                                                    <select name="jenis" id="jenis" class="form-control">
                                                        <option value="">Pilih Jenis Soal</option>
                                                        <option value="pilihan_ganda">Pilihan Ganda</option>
                                                        <option value="essai">Essai</option>
                                                    </select>
                                                </div>


                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-header">
                                        <h4 class="card-title">Isi Soal</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="form-nama">Nama <span class="text-muted">(informasi materi
                                                    soal)</span></label>
                                            <input type="text" name="nama" class="form-control" id="nama"
                                                placeholder="Masukkan Nama Soal">
                                        </div>
                                        <div class="form-group">
                                            <label for="form-soal">Soal</label>
                                            <textarea name="soal" class="form-control" id="soal" cols="30" rows="10"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="media-soal">Media Soal (opsional)</label>
                                            <input type="file" name="media" id="" class="form-control">
                                            <small id="mediaHelp" class="form-text text-muted">File :
                                                MP3/MP4/3GP/AVI</small>
                                        </div>

                                        <div class="form-group" id="form-pilgan" style="display: none;">
                                            <!-- Tampilkan input untuk Pilihan Ganda di sini -->
                                            <div class="form-group">
                                                <label for="pilihan_ganda">Jawaban Pilihan Ganda</label>
                                                <div class="row mt-1">
                                                    <div class="col-lg-9 order-lg-1 order-sm-2" id="list-pg">
                                                        <h1 class="text-muted text-center"><span
                                                                class="badge badge-danger">Pilih Jumlah Jawaban</span></h1>
                                                        <h2 class="text-center"><i class="fas fa-arrow-down"></i></h2>
                                                        <h1 class="text-muted text-center"><span
                                                                class="badge badge-success">Pilih Jawaban Benar</span></h1>
                                                    </div>
                                                    <div class="col-lg-3 order-lg-2 ordder-sm-1">
                                                        <div class="form-group">
                                                            <label for="jumlah-pilihan">Jumlah Pilihan</label>
                                                            <select name="jumlah-pilihan" id="jumlah-pilihan"
                                                                class="form-control">
                                                                <option value="">Pilihan</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="jawaban-benar">Jawaban Benar</label>
                                                            <select name="jawaban[benar]" id="jawaban-benar"
                                                                class="form-control">
                                                                <option value="">-- Klik Jumlah Pilihan Dulu --
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group" id="form-essai" style="display: none;">
                                            <!-- Tampilkan input untuk Essai di sini -->
                                            <div class="form-group">
                                                <label for="form-essai">Jawaban Essai</label>
                                                <input type="text" name="jawaban[essai]" class="form-control"
                                                    id="form-essai" placeholder="Masukkan jawaban essai (huruf kecil)">
                                            </div>
                                        </div>

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

    <!-- Modal Detail soal -->
    @foreach ($data as $value)
        <div class="modal fade" id="detailsoal{{ $value->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="detailsoalModal">Detail Soal</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title"></h5>

                                    <!-- Browser Default Validation -->

                                    <table class="table table-hover">
                                        <tr>
                                            <th scope="col">Nama Soal</th>
                                            <td>{{ $value->nama }} </td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Paket Soal</th>
                                            <td>{{ $value->paketsoal->kode_paket }} </td>
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
                                            <th scope="col">Jenis Soal</th>
                                            <td>{{ $value->jenis }} </td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Isi Soal</th>
                                            <td>{!! $value->soal !!} </td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Media Soal</th>
                                            <td>{!! $value->media !!} </td>
                                        </tr>

                                        <tr>
                                            <th scope="col">Jawaban</th>
                                            <td>
                                                @if ($value->jenis == 'essai')
                                                    <!-- Tampilkan jawaban essai -->
                                                    {{ $value->soal_jawaban->first()->jawaban }}
                                                    @elseif ($value->jenis == 'pilihan_ganda')
                                                    <!-- Tampilkan jawaban pilihan ganda -->
                                                    @foreach ($value->soal_jawaban as $jawaban)
                                                    {!! $jawaban->jawaban !!}
                                                    @endforeach
                                                @endif
                                            </td>
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
                </div>
            </div>
        </div>
    @endforeach


    {{-- Edit soal --}}
    @foreach ($data as $value)
        <div class="modal fade" id="editModal{{ $value->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-xl ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="editModal">Edit soal</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="col-lg-12">


                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title"></h5>
                                    <form method="POST" action="/updatesoal" class="row g-3"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">Detail Soal</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-6 col-sm-12">
                                                        <div class="form-group">
                                                            <input type="hidden" class="form-control" id="id"
                                                                name="id" value="{{ $value->id }}">
                                                            <label for="id_kelas">Nama kelas</label>
                                                            <select class="form-control" id="id_kelas" name="id_kelas">
                                                                <option value="{{ $value->id_kelas }}">
                                                                    {{ $value->kelas->nama_kelas }}
                                                                </option>
                                                                @foreach ($kelas as $items)
                                                                    <option value="{{ $items->id }}">
                                                                        {{ $items->nama_kelas }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-3 col-md-6 col-sm-12">
                                                        <div class="form-group">
                                                            <input type="hidden" class="form-control" id="id"
                                                                name="id" value="{{ $value->id }}">
                                                            <label for="form-jenis">Mapel</label>
                                                            <select class="form-control" id="jenis" name="id_mapel">
                                                                <option value="{{ $value->id_mapel }}">
                                                                    {{ $value->mapel->nama_mapel }}
                                                                </option>

                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-3 col-md-6 col-sm-12">
                                                        <div class="form-group">
                                                            <input type="hidden" class="form-control" id="id"
                                                                name="id" value="{{ $value->id }}">
                                                            <label for="form-paket">Paket Soal</label>
                                                            <select class="form-control" id="paket_soal_id"
                                                                name="paket_soal_id">
                                                                <option value="{{ $value->paket_soal_id }}">
                                                                    {{ $value->paketsoal->kode_paket }}
                                                                </option>
                                                                @foreach ($paketsoal as $items)
                                                                    <option value="{{ $items->id }}">
                                                                        {{ $items->kode_paket }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-3 col-md-6 col-sm-12">
                                                        <div class="form-group">
                                                            <input type="hidden" class="form-control" id="id"
                                                                name="id" value="{{ $value->id }}">
                                                            <label for="form-jenis">Jenis Soal</label>
                                                            <select class="form-control" id="jenis" name="jenis" disabled>
                                                                <option value="{{ $value->jenis }}">
                                                                    {{ $value->jenis}}
                                                                </option>
                                                                {{-- <option value="pilihan_ganda">Pilihan Ganda</option>
                                                                <option value="essai">Essai</option> --}}

                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">Isi Soal</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="form-nama">Nama <span class="text-muted">(informasi materi
                                                            soal)</span></label>
                                                    <input type="text" name="nama" value="{{ $value->nama }}"
                                                        class="form-control" id="form-nama"
                                                        placeholder="Masukkan Nama Soal">
                                                </div>
                                                <div class="form-group">
                                                    <label for="form-soal">Soal</label>
                                                    <textarea name="soal" class="form-control" id="edit_soal_{{ $value->id }}" cols="30" rows="10">
                                                        {{ $value->soal }}
                                                    </textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="media-soal">Media Soal (opsional)</label>
                                                    <input type="file" name="soal[soal_media]" id=""
                                                        class="form-control">
                                                    <small id="mediaHelp" class="form-text text-muted">File :
                                                        MP3/MP4/3GP/AVI</small>
                                                </div>



                                                @if ($value->jenis == 'essai')
                                                <div class="form-group" id="form-essai">
                                                    <label for="form-jawaban">Jawaban Essai</label>
                                                    <input type="text" name="jawaban[essai]" value="{{ $value->soal_jawaban[0]->jawaban }}"
                                                        class="form-control" id="form-jawaban"
                                                        placeholder="Masukkan jawaban essai (huruf kecil)">
                                                </div>
                                            @elseif($value->jenis == 'pilihan_ganda')
                                                <div id="form-pilgan">
                                                    <div class="form-group">
                                                        <label for="">Jawaban Pilihan Ganda</label>
                                                        <div class="row mt-1">
                                                            <div class="col-lg-9 order-lg-1 order-sm-2" id="list-pg">
                                                                @foreach ($value->soal_jawaban as $key => $jawaban)
                                                                    <div class="mb-4" id="jawaban-{{ $key + 1 }}">
                                                                        <h4><b>Pilihan {{ $key + 1 }}</b></h4>
                                                                        <textarea name="jawaban[pilgan][{{ $jawaban->id }}][jawaban]" id="jawaban-pilgan-{{ $key + 1 }}"
                                                                            cols="30" rows="10" class="form-control jawaban-pilgan">
                                                                            {{ $jawaban->jawaban }}
                                                                        </textarea>
                                                                        <h5 class="mt-2">Media Jawaban (opsional)</h5>
                                                                        <input type="file" name="jawaban[pilgan][{{ $jawaban->id }}][media]"
                                                                            id="media-jawaban-{{ $key + 1 }}" class="form-control">
                                                                        <small class="form-text text-muted">File : MP3/MP4/3GP/AVI</small>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                            <div class="col-lg-3 order-lg-2 order-sm-1">
                                                                <div class="form-group">
                                                                    <label for="jawaban-benar">Jawaban Benar</label>
                                                                    <select name="jawaban[benar]" id="jawaban-benar" class="form-control">
                                                                        @foreach ($value->soal_jawaban as $key => $jawaban)
                                                                            <option value="{{ $jawaban->id }}"
                                                                                {{ $jawaban['status'] == 1 ? 'selected' : '' }}>
                                                                                Pilihan {{ $key + 1 }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif

                                            </div>

                                        </div>

                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary rounded-pill px-4 "
                                    style="font-size: 0.75rem" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="update" class="btn btn-primary rounded-pill px-4 "
                                    style="font-size: 0.75rem">Update</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach


    <div class="modal fade" id="modal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modal2">Modal title</h1>
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

        <script>
            $(document).ready(function() {
                // Inisialisasi CKEditor pada modal tambah data
                ClassicEditor
                    .create(document.querySelector('#soal'))
                    .catch(error => {
                        console.error(error);
                    });

                // Inisialisasi CKEditor pada setiap modal edit data
                @foreach ($data as $value)
                    ClassicEditor
                        .create(document.querySelector('#edit_soal_{{ $value->id }}'))
                        .catch(error => {
                            console.error(error);
                        });

                    // Inisialisasi CKEditor pada setiap jawaban edit data
                    @foreach ($value->soal_jawaban as $key => $jawaban)
                        ClassicEditor
                            .create(document.querySelector('#jawaban-pilgan-{{ $key + 1 }}'))
                            .catch(error => {
                                console.error(error);
                            });
                    @endforeach
                @endforeach
            });
        </script>

        <script>
            $(document).ready(function() {
                $('#jenis').on('change', function() {
                    var jenis = $(this).val();

                    if (jenis === 'pilihan_ganda') {
                        $('#form-pilgan').show();
                        $('#form-essai').hide();
                    } else if (jenis === 'essai') {
                        $('#form-essai').show();
                        $('#form-pilgan').hide();
                    } else {
                        $('#form-pilgan').hide();
                        $('#form-essai').hide();
                    }
                });
            });


            $('#jumlah-pilihan').on('change', function() {
                let list = '';
                let option = '<option value>-- Jawaban --</option>';
                let jumlah = $(this).val();

                for (let id = 1; id <= jumlah; id++) {
                    let pilihan = String.fromCharCode(64 + id);

                    list += `
            <div class="mb-4" id="jawaban-${id}">
              <h4><b>Pilihan ${pilihan}</b></h4>
              <textarea name="jawaban[pilgan][${id}][jawaban]" id="jawaban-pilgan-${id}" cols="30" rows="10" class="form-control jawaban-pilgan"></textarea>
              <h5 class="mt-2">Media Jawaban (opsional)</h5>
              <input type="file" name="jawaban[pilgan][${id}][media]" id="media-jawaban-${id}" class="form-control">
              <small class="form-text text-muted">File : MP3/MP4/3GP/AVI</small>
            </div>`;

                    option += `<option value="${id}">${pilihan}</option>`;
                }
                $('#list-pg').html(list);

                $('#list-pg .jawaban-pilgan:not(.initialized)').each(function() {
                    $(this).addClass('initialized');
                    ClassicEditor
                        .create(document.querySelector('#' + $(this).attr('id')), {
                            height: '100px',
                            ckfinder: {
                                uploadUrl: '/filemanager/upload?type=Images&_token='
                            }
                        })
                        .catch(error => {
                            console.error(error);
                        });
                });

                $('#jawaban-benar').html(option);
            });
        </script>
    </div>
    </div>


@endsection
