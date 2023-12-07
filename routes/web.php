<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgamaController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BayarController;
use App\Http\Controllers\BayarsiswaController;
use App\Http\Controllers\DetpangkalController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\NotifikasiController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\RekappangkalController;
use App\Http\Controllers\RuangController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SoalController;
use App\Http\Controllers\TpController;
use App\Http\Controllers\TugasController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */
//home
Route::get('/home', [HomeController::class, 'home'])->middleware('auth');

Route::controller(LoginController::class)->group(function () {
    Route::get('/', [LoginController::class, 'index'])->name('login');
    Route::post('login/proses', 'proses');
    Route::get('logout', 'logout');
});

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::middleware(['auth'])->group(function () {

    //siswa
    Route::get('/siswa', [SiswaController::class, 'siswa']);
    Route::post('/prosesSiswa', [SiswaController::class, 'prosesSiswa']);
    Route::post('/updateSiswa', [SiswaController::class, 'updateSiswa']);
    Route::get('/hapusSiswa/{id}', [SiswaController::class, 'hapusSiswa']);
    Route::post('/importexcel', [SiswaController::class, 'importexcel']);

    //exam
    Route::get('/exam', [ExamController::class, 'exam']);
    Route::post('/prosesexam', [ExamController::class, 'prosesexam']);
    Route::post('/updateexam', [ExamController::class, 'updateexam']);
    Route::get('/hapusexam/{id}', [ExamController::class, 'hapusexam']);

    //Opsi
    Route::get('/opsi', [AdminController::class, 'opsi']);
    Route::post('/prosesopsi', [AdminController::class, 'prosesopsi']);
    Route::get('/hapusopsi/{id}', [AdminController::class, 'hapusopsi']);

    //jadual
    Route::get('/jadwal', [JadwalController::class, 'jadwal']);
    Route::post('/prosesjadwal', [JadwalController::class, 'prosesjadwal']);
    Route::post('/updatejadwal', [JadwalController::class, 'updatejadwal']);
    Route::get('/hapusjadwal/{id}', [JadwalController::class, 'hapusjadwal']);

    //mapel
    Route::get('/mapel', [MapelController::class, 'mapel']);
    Route::post('/prosesMapel', [MapelController::class, 'prosesMapel']);
    Route::post('/updateMapel', [MapelController::class, 'updateMapel']);
    Route::get('/hapusMapel/{id}', [MapelController::class, 'hapusMapel']);
    
    //bahan materi
    Route::get('/materi', [MateriController::class, 'materi']);
    Route::post('/upload', [MateriController::class, 'upload'])->name('ckeditor.upload');
    Route::post('/prosesmateri', [MateriController::class, 'prosesmateri']);
    Route::post('/updatemateri', [MateriController::class, 'updatemateri']);
    Route::get('/lihatmateri/{id}', [MateriController::class, 'lihatmateri']);
    Route::get('/hapusmateri/{id}', [MateriController::class, 'hapusmateri']);

    //tugas materi
    Route::get('/tugas', [TugasController::class, 'tugas']);
    Route::post('/prosestugas', [TugasController::class, 'prosestugas']);
    Route::post('/updatetugas', [TugasController::class, 'updatetugas']);
    Route::get('/lihattugas/{id}', [TugasController::class, 'lihattugas']);
    Route::get('/hapustugas/{id}', [TugasController::class, 'hapustugas']);

    //soal
    // Route::get('/soal', [AdminController::class, 'soal']);
    // Route::get('/rekapdsoal', [AdminController::class, 'rekapsoal']);
    // Route::post('/prosessoal', [AdminController::class, 'prosessoal']);
    // Route::get('/hapussoal/{id}', [AdminController::class, 'hapussoal']);
    // Route::post('/soal/data', [SoalController::class])->name('soal.data');
    // Route::resource('soal', SoalController::class);

    //paketsoal
    // Route::get('/paketsoal', [SoalController::class, 'index']);
    // Route::post('/paket-soal/data', 'PaketController@dataPaketSoal')->name('paket-soal.data');
    // Route::get('/paket-soal/select', 'PaketController@select')->name('paket-soal.select');
    // Route::resource('paket-soal', 'PaketController');

    // soal
    Route::get('/soal', [SoalController::class, 'soal']);
    Route::post('/prosessoal', [SoalController::class, 'prosessoal']);
    Route::post('/updatesoal', [SoalController::class, 'updatesoal']);
    Route::get('/lihatsoal/{id}', [SoalController::class, 'lihatsoal']);
    Route::get('/hapussoal/{id}', [SoalController::class, 'hapussoal']);
    Route::get('/get-subjects-and-classes/{paketSoal}', 'SoalController@getSubjectsAndClasses');


    //Paket soal
    Route::get('/paketsoal', [PaketController::class, 'paket']);
    Route::post('/prosespaket', [PaketController::class, 'prosespaket']);
    Route::post('/updatepaket', [PaketController::class, 'updatepaket']);
    Route::get('/lihatpaket/{id}', [PaketController::class, 'lihatpaket']);
    Route::get('/hapuspaket/{id}', [PaketController::class, 'hapuspaket']);

    // Grup rute untuk pengguna (Admin) yang telah login
    Route::group(['middleware' => ['cekUserLogin:1']], function () {

        //level
        Route::get('/level', [LevelController::class, 'level']);
        Route::post('/prosesLevel', [LevelController::class, 'proseslevel']);
        Route::post('/updatelevel', [LevelController::class, 'updatelevel']);
        Route::get('/hapusLevel/{id}', [LevelController::class, 'hapusLevel']);

        //notifikasi
        Route::get('/notifikasi', [NotifikasiController::class, 'notifikasi']);
        Route::post('/prosesnotifikasi', [NotifikasiController::class, 'prosesnotifikasi']);
        Route::post('/updatenotifikasi', [NotifikasiController::class, 'updatenotifikasi']);
        Route::get('/hapusnotifikasi/{id}', [NotifikasiController::class, 'hapusnotifikasi']);

        //User
        Route::get('/user', [UserController::class, 'user']);
        Route::post('/prosesuser', [UserController::class, 'prosesuser']);
        Route::post('/updateuser', [UserController::class, 'updateuser']);
        Route::get('/hapususer/{id}', [UserController::class, 'hapususer']);

        //jurusan
        Route::get('/jurusan', [JurusanController::class, 'jurusan']);
        Route::post('/prosesJurusan', [JurusanController::class, 'prosesJurusan']);
        Route::post('/updateJurusan', [JurusanController::class, 'updateJurusan']);
        Route::get('/search', [JurusanController::class, 'search']);
        Route::get('/hapusJurusan/{id}', [JurusanController::class, 'hapusJurusan']);

        //Kelas
        Route::get('/kelas', [kelasController::class, 'kelas']);
        Route::post('/proseskelas', [KelasController::class, 'proseskelas']);
        Route::post('/updatekelas', [KelasController::class, 'updatekelas']);
        Route::get('/hapuskelas/{id}', [KelasController::class, 'hapuskelas']);

        //agama
        Route::get('/agama', [AgamaController::class, 'agama']);
        Route::post('/prosesAgama', [AgamaController::class, 'prosesAgama']);
        Route::post('/updateAgama', [AgamaController::class, 'updateAgama']);
        Route::post('/importagama', [AgamaController::class, 'importAgama']);
        Route::get('/hapusAgama/{id}', [AgamaController::class, 'hapusAgama']);

        //ruang
        Route::get('/ruang', [RuangController::class, 'ruang']);
        Route::post('/prosesRuang', [RuangController::class, 'prosesRuang']);
        Route::post('/updateRuang', [RuangController::class, 'updateRuang']);
        Route::get('/hapusRuang/{id}', [RuangController::class, 'hapusRuang']);

        //sekolah
        Route::get('/sekolah', [SekolahController::class, 'sekolah']);
        Route::post('/prosesSekolah', [SekolahController::class, 'prosesSekolah']);
        Route::post('/updateSekolah', [SekolahController::class, 'updateSekolah']);
        Route::get('/hapusSekolah/{id}', [SekolahController::class, 'hapussekolah']);

        //guru
        Route::get('/guru', [GuruController::class, 'guru']);
        Route::post('/prosesGuru', [GuruController::class, 'prosesGuru']);
        Route::post('/updateGuru', [GuruController::class, 'updateGuru']);
        Route::get('/hapusGuru/{id}', [GuruController::class, 'hapusGuru']);

        //Administrator
        Route::get('/admin', [AdminController::class, 'admin']);
        Route::post('/prosesAdmin', [AdminController::class, 'prosesAdmin']);
        Route::post('/updateAdmin', [AdminController::class, 'updateAdmin']);
        Route::get('/hapusAdmin/{id}', [AdminController::class, 'hapusAdmin']);

        //tp
        Route::get('/tp', [TpController::class, 'tp']);
        Route::post('/prosesTp', [TpController::class, 'prosesTp']);
        Route::post('/updateTp', [TpController::class, 'updateTp']);
        Route::get('/hapusTp/{id}', [TpController::class, 'hapusTp']);

        //detpangkal
        Route::get('/detpangkal', [DetpangkalController::class, 'detpangkal']);
        Route::post('/prosesdetPangkal', [DetpangkalController::class, 'prosesdetPangkal']);
        Route::post('/updatedetPangkal', [DetpangkalController::class, 'updatedetPangkal']);
        Route::get('/hapusdetPangkal/{id}', [DetpangkalController::class, 'hapusdetPangkal']);

        //rekappangkal
        Route::get('/rekappangkal', [RekappangkalController::class, 'rekappangkal']);
        Route::post('/prosesrekapPangkal', [RekappangkalController::class, 'prosesrekapPangkal']);
        Route::post('/updaterekapPangkal', [RekappangkalController::class, 'updaterekapPangkal']);
        Route::get('/hapusrekapPangkal/{id}', [RekappangkalController::class, 'hapusrekapPangkal']);

        //bayar siswa
        Route::get('/bayarsiswa', [BayarSiswaController::class, 'bayarsiswa']);
        Route::post('/prosesbayarsiswa', [BayarsiswaController::class, 'prosesbayarsiswa']);
        Route::post('/updatebayarsiswa', [BayarsiswaController::class, 'updatebayarsiswa']);
        Route::get('/hapus/{id}', [BayarsiswaController::class, 'hapus']);

        //Bayar
        Route::get('/bayar', [BayarController::class, 'bayar']);
        Route::post('/prosesbayar', [BayarController::class, 'prosesbayar']);
        Route::post('/updatebayar', [BayarController::class, 'updatebayar']);
        Route::get('/hapusbayar/{id}', [BayarController::class, 'hapusbayar']);

        //Pembayaran
        Route::get('/pembayaran', [PembayaranController::class, 'pembayaran']);
        Route::post('/prosespembayaran', [PembayaranController::class, 'prosespembayaran']);
        Route::post('/updatepembayaran', [PembayaranController::class, 'updatepembayaran']);
        Route::get('/hapuspembayaran/{id}', [PembayaranController::class, 'hapuspembayaran']);

    });

    // Grup rute untuk pengguna (Guru) yang telah login dengan cekUserLogin:2
    Route::group(['middleware' => ['cekUserLogin:2']], function () {

    });

});
