@extends('admin.dashboard')
@section('akademik', 'collapsed')
@section('content')
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- library Flatpickr -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="card-title inline-block">Data Ujian</h5>
                            </div>
                            <div>
                                <button class="btn btn-danger rounded-pill px-4" style="font-size: 0.75rem"
                                    data-bs-toggle="modal" data-bs-target="#modal2">Import Excel</button>
                                <button class="btn btn-primary rounded-pill px-4" style="font-size: 0.9rem"
                                    data-bs-toggle="modal" data-bs-target="#modalujian"> + Ujian</button>
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
                                    <th scope="col">Nama Ujian</th>
                                    <th scope="col">Paket Soal</th>
                                    <th scope="col">Kelas</th>
                                    <th scope="col">Waktu Mulai</th>
                                    <th scope="col">Waktu Ujian</th>
                                    <th scope="col">Token</th>
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
                                    <td>{{ $value->kelas->nama_kelas }} </td>
                                    <td>{{ $value->waktu_mulai }} </td>
                                    <td>{{ $value->waktu_ujian }} </td>
                                    <td>{{ $value->token }} </td>

                                    <td>

                                        <a href="/hapusujian/{{ $value->id }}" button type="button"
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
    {{-- Tambah Ujian --}}
    <div class="modal fade" id="modalujian" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Form Tambah Ujian </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-lg-12">


                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"></h5>

                                <!-- Browser Default Validation -->

                                <form method="POST" id="tambah-ujian" action="/prosesujian" class="row g-3">
                                    @csrf


                                    <div class="col-md-12">
                                        <label for="nama" class="form-label">Nama Ujian</label>
                                        <input type="text" name="nama" class="form-control" id="nama"
                                            hint="nama" placeholder="Masukkan Nama Ujian (UTS/UAS)" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="id_kelas" class="form-label">Kelas</label>
                                        <select class="form-control select-kelas" name="id_kelas" id="id_kelas">
                                            <option value="" selected disabled>Pilih Nama kelas</option>
                                            @foreach ($kelas as $items)
                                                <option value="{{ $items->id }}">{{ $items->nama_kelas }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="id_mapel" class="form-label">Mata Pelajaran</label>
                                        <select class="form-control select-mapel" id="id_mapel" name="id_mapel">
                                            <option value="" selected disabled>Pilih Nama Pelajaran</option>
                                            @foreach ($mapel as $items)
                                                <option value="{{ $items->id }}">{{ $items->nama_mapel }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="paket_soal_id" class="form-label">Paket Soal</label>
                                        <select class="form-control select-paket" name="paket_soal_id" id="paket_soal_id">
                                            <option value="" selected disabled>Pilih Paket Soal</option>
                                            @foreach ($paketsoal as $paket)
                                                <option value="{{ $paket->id }}">{{ $paket->kode_paket }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-12">
                                        <label for="waktu_mulai" class="form-label">Waktu Mulai</label>
                                        <input type="text" name="waktu_mulai" class="form-control flatpickr"
                                            id="waktu_mulai" placeholder="Masukkan Waktu Mulai Ujian" required>
                                    </div>

                                    <script>
                                        $(document).ready(function() {
                                            flatpickr('.flatpickr', {
                                                enableTime: true,
                                                dateFormat: 'Y-m-d H:i:s',
                                                placeholder: 'Pilih waktu',
                                            });
                                        });
                                    </script>

                                    <div class="col-md-12">
                                        <label for="waktu_ujian" class="form-label">Waktu Ujian (dalam menit)</label>
                                        <input type="number" name="waktu_ujian" class="form-control" id="waktu_ujian"
                                            placeholder="Masukkan Waktu Ujian" required>
                                    </div>


                                    <!-- End Browser Default Validation -->

                            </div>

                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary rounded-pill px-4 " style="font-size: 0.75rem"
                        data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="simpanBtn" name="simpan" value="simpan"
                        class="btn btn-primary rounded-pill px-4 " style="font-size: 0.75rem">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>


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
            $(document).ready(function() {
                // cari kelas (select2)
                $('.select-kelas').select2({
                    theme: 'bootstrap-5',
                    placeholder: 'Pilih kelas...',
                });

                // cari mapel (select2)
                $('.select-mapel').select2({
                    theme: 'bootstrap-5',
                    placeholder: 'Pilih Mata Pelajaran...',
                });

                // cari paket soal (select2)
                $('.select-paket').select2({
                    theme: 'bootstrap-5',
                    placeholder: 'Pilih Paket Soal...',
                });

            });
        </script>

        <script>
            document.getElementById('tambah-ujian').addEventListener('submit', function(e) {
                e.preventDefault();
                var formData = new FormData(this);

                // Kirim formulir menggunakan fetch API
                fetch(this.action, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                                'content')
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        // Tindakan yang perlu dilakukan setelah berhasil
                        alert('Berhasil: ' + data.message);
                        document.querySelector('.select-mapel').value = '';
                        document.querySelector('.select-kelas').value = '';
                        document.querySelector('.select-paket').value = '';
                        this.reset();
                        // Tambahkan logika lainnya yang diperlukan
                    })
                    .catch(error => {
                        // Tindakan yang perlu dilakukan jika terjadi kesalahan
                        alert('Gagal: ' + error.message);
                    });
            });
        </script>

        {{-- js submit button tambah --}}
        <script>
            $(document).ready(function() {
                $('#simpanBtn').click(function() {
                    $('form').submit();
                });
            });
        </script>
    </div>
@endsection
