<?php

use App\Http\Controllers\AgamaControllerAPI;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\BayarControllerAPI;
use App\Http\Controllers\DetpangkalControllerAPI;
use App\Http\Controllers\EkstraControllerAPI;
use App\Http\Controllers\ExamControllerAPI;
use App\Http\Controllers\GuruControllerAPI;
use App\Http\Controllers\JadwalControllerAPI;
use App\Http\Controllers\JawabexamControllerAPI;
use App\Http\Controllers\JurusanControllerAPI;
use App\Http\Controllers\KelasControllerAPI;
use App\Http\Controllers\LevelControllerAPI;
use App\Http\Controllers\MapelControllerAPI;
use App\Http\Controllers\MateriControllerAPI;
use App\Http\Controllers\NotifikasiControllerAPI;
use App\Http\Controllers\OpsiControllerAPI;
use App\Http\Controllers\PelanggaranControllerAPI;
use App\Http\Controllers\PembayaranControllerAPI;
use App\Http\Controllers\RuangControllerAPI;
use App\Http\Controllers\SekolahControllerAPI;
use App\Http\Controllers\SiswaControllerAPI;
use App\Http\Controllers\SoalControllerAPI;
use App\Http\Controllers\TpControllerAPI;
use App\Http\Controllers\TugasControllerAPI;
use App\Http\Controllers\UserControllerAPI;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('loginApi', [AuthenticationController::class, 'loginApi']);

//Auth
// Route::middleware('auth:sanctum')->group(function () {
Route::get('logoutApi', [AuthenticationController::class, 'logoutApi']);

//USER API ROUTE
Route::apiResource('user', UserControllerAPI::class);
// Route::get('getUser', [UserControllerAPI::class, 'getUser']);
// Route::get('showUser', [UserControllerAPI::class, 'showUser']);
// Route::post('postUser', [UserControllerAPI::class, 'createUser']);
// Route::post('updateUser/{user:id}', [UserControllerAPI::class, 'updateUser']);
// Route::post('deleteUser/{user:id}', [UserControllerAPI::class, 'deleteUser']);

//JURUSAN API ROUTE
Route::get('getJurusan', [JurusanControllerAPI::class, 'getJurusan']);
Route::get('showJurusan', [JurusanControllerAPI::class, 'showJurusan']);
Route::post('postJurusan', [JurusanControllerAPI::class, 'createJurusan']);
Route::post('updateJurusan/{jurusan:id}', [JurusanControllerAPI::class, 'updateJurusan']);
Route::post('deleteJurusan/{jurusan:id}', [JurusanControllerAPI::class, 'deleteJurusan']);

//SEKOLAH API ROUTE
Route::get('getSekolah', [SekolahControllerAPI::class, 'getSekolah']);
Route::get('showSekolah', [SekolahControllerAPI::class, 'showSekolah']);
Route::post('postSekolah', [SekolahControllerAPI::class, 'createSekolah']);
Route::post('updateSekolah/{sekolah:id}', [SekolahControllerAPI::class, 'updateSekolah']);
Route::post('deleteSekolah/{sekolah:id}', [SekolahControllerAPI::class, 'deleteSekolah']);

//AGAMA API ROUTE
Route::get('getAgama', [AgamaControllerAPI::class, 'getAgama']);
Route::get('showAgama', [AgamaControllerAPI::class, 'showAgama']);
Route::post('postAgama', [AgamaControllerAPI::class, 'createAgama']);
Route::post('updateAgama/{agama:id}', [AgamaControllerAPI::class, 'updateAgama']);
Route::post('deleteAgama/{agama:id}', [AgamaControllerAPI::class, 'deleteAgama']);

//SISWA API ROUTE
Route::get('getSiswa', [SiswaControllerAPI::class, 'getSiswa']);
Route::get('showSiswa', [SiswaControllerAPI::class, 'showSiswa']);
Route::post('postSiswa', [SiswaControllerAPI::class, 'createSiswa']);
Route::post('updateSiswa/{siswa:id}', [SiswaControllerAPI::class, 'updateSiswa']);
Route::post('deleteSiswa/{siswa:id}', [SiswaControllerAPI::class, 'deleteSiswa']);

//GURU API ROUTE
Route::get('getGuru', [GuruControllerAPI::class, 'getGuru']);
Route::get('showGuru', [GuruControllerAPI::class, 'showGuru']);
Route::post('postGuru', [GuruControllerAPI::class, 'createGuru']);
Route::post('updateGuru/{guru:id}', [GuruControllerAPI::class, 'updateGuru']);
Route::post('deleteGuru/{guru:id}', [GuruControllerAPI::class, 'deleteGuru']);

//MAPEL API ROUTE
Route::get('getMapel', [MapelControllerAPI::class, 'getMapel']);
Route::get('showMapel', [MapelControllerAPI::class, 'showMapel']);
Route::post('postMapel', [MapelControllerAPI::class, 'createMapel']);
Route::post('updateMapel/{mapel:id}', [MapelControllerAPI::class, 'updateMapel']);
Route::post('deleteMapel/{mapel:id}', [MapelControllerAPI::class, 'deleteMapel']);

//JADWAL API ROUTE
Route::get('getJadwal', [JadwalControllerAPI::class, 'getJadwal']);
Route::get('showJadwal', [JadwalControllerAPI::class, 'showJadwal']);
Route::post('postJadwal', [JadwalControllerAPI::class, 'createJadwal']);
Route::post('updateJadwal/{jadwal:id}', [JadwalControllerAPI::class, 'updateJadwal']);
Route::post('deleteJadwal/{jadwal:id}', [JadwalControllerAPI::class, 'deleteJadwal']);

//MATERI API ROUTE
Route::get('getMateri', [MateriControllerAPI::class, 'getMateri']);
Route::get('showMateri', [MateriControllerAPI::class, 'showMateri']);
Route::post('postMateri', [MateriControllerAPI::class, 'createMateri']);
Route::post('updateMateri/{materi:id}', [MateriControllerAPI::class, 'updateMateri']);
Route::post('deleteMateri/{materi:id}', [MateriControllerAPI::class, 'deleteMateri']);

//TUGAS API ROUTE
Route::get('getTugas', [TugasControllerAPI::class, 'getTugas']);
Route::get('showTugas', [TugasControllerAPI::class, 'showTugas']);
Route::post('postTugas', [TugasControllerAPI::class, 'createTugas']);
Route::post('updateTugas/{tugas:id}', [TugasControllerAPI::class, 'updateTugas']);
Route::post('deleteTugas/{tugas:id}', [TugasControllerAPI::class, 'deleteTugas']);

//EKSTRA API ROUTE
Route::get('getEkstra', [EkstraControllerAPI::class, 'getEkstra']);
Route::get('showEkstra', [EkstraControllerAPI::class, 'showEkstra']);
Route::post('postEkstra', [EkstraControllerAPI::class, 'createEkstra']);
Route::post('updateEkstra/{ekstra:id}', [EkstraControllerAPI::class, 'updateEkstra']);
Route::post('deleteEkstra/{ekstra:id}', [EkstraControllerAPI::class, 'deleteEkstra']);

//
//KELAS API ROUTE
Route::get('getKelas', [KelasControllerAPI::class, 'getKelas']);
Route::get('showKelas', [KelasControllerAPI::class, 'showKelas']);
Route::post('postKelas', [KelasControllerAPI::class, 'createKelas']);
Route::post('updateKelas/{kelas:id}', [KelasControllerAPI::class, 'updateKelas']);
Route::post('deleteKelas/{kelas:id}', [KelasControllerAPI::class, 'deleteKelas']);

//LEVEL API ROUTE
Route::get('getLevel', [LevelControllerAPI::class, 'getLevel']);
Route::get('showLevel', [LevelControllerAPI::class, 'showLevel']);
Route::post('postLevel', [LevelControllerAPI::class, 'createLevel']);
Route::post('updateLevel/{level:id}', [LevelControllerAPI::class, 'updateLevel']);
Route::post('deleteLevel/{level:id}', [LevelControllerAPI::class, 'deleteLevel']);

//RUANG API ROUTE
Route::get('getRuang', [RuangControllerAPI::class, 'getRuang']);
Route::get('showRuang', [RuangControllerAPI::class, 'showRuang']);
Route::post('postRuang', [RuangControllerAPI::class, 'createRuang']);
Route::post('updateRuang/{ruang:id}', [RuangControllerAPI::class, 'updateRuang']);
Route::post('deleteRuang/{ruang:id}', [RuangControllerAPI::class, 'deleteRuang']);

//PELANGGARAN API ROUTE
Route::get('getPelanggaran', [PelanggaranControllerAPI::class, 'getPelanggaran']);
Route::get('showPelanggaran', [PelanggaranControllerAPI::class, 'showPelanggaran']);
Route::post('postPelanggaran', [PelanggaranControllerAPI::class, 'createPelanggaran']);
Route::post('updatePelanggaran/{pelanggaran:id}', [PelanggaranControllerAPI::class, 'updatePelanggaran']);
Route::post('deletePelanggaran/{pelanggaran:id}', [PelanggaranControllerAPI::class, 'deletePelanggaran']);

//TAHUN PELAJARAN API ROUTE
Route::get('getTp', [TpControllerAPI::class, 'getTp']);
Route::get('showTp', [TpControllerAPI::class, 'showTp']);
Route::post('postTp', [TpControllerAPI::class, 'createTp']);
Route::post('updateTp/{tp:id}', [TpControllerAPI::class, 'updateTp']);
Route::post('deleteTp/{tp:id}', [TpControllerAPI::class, 'deleteTp']);

//DET_PANGKAL API ROUTE
Route::get('getDetpangkal', [DetpangkalControllerAPI::class, 'getDetpangkal']);
Route::get('showDetpangkal', [DetpangkalControllerAPI::class, 'showDetpangkal']);
Route::post('postDetpangkal', [DetpangkalControllerAPI::class, 'createDetpangkal']);
Route::post('updateDetpangkal/{detpangkal:id}', [DetpangkalControllerAPI::class, 'updateDetpangkal']);
Route::post('deleteDetpangkal/{detpangkal:id}', [DetpangkalControllerAPI::class, 'deleteDetpangkal']);

//NOTIFIKASI API ROUTE
Route::get('getNotifikasi', [NotifikasiControllerAPI::class, 'getNotifikasi']);
Route::get('showNotifikasi', [NotifikasiControllerAPI::class, 'showNotifikasi']);
Route::post('postNotifikasi', [NotifikasiControllerAPI::class, 'createNotifikasi']);
Route::post('updateNotifikasi/{notifikasi:id}', [NotifikasiControllerAPI::class, 'updateNotifikasi']);
Route::post('deleteNotifikasi/{notifikasi:id}', [NotifikasiControllerAPI::class, 'deleteNotifikasi']);

//BAYAR API ROUTE
Route::get('getBayar', [BayarControllerAPI::class, 'getBayar']);
Route::get('showBayar', [BayarControllerAPI::class, 'showBayar']);
Route::post('postBayar', [BayarControllerAPI::class, 'createBayar']);
Route::post('updateBayar/{bayar:id}', [BayarControllerAPI::class, 'updateBayar']);
Route::post('deleteBayar/{bayar:id}', [BayarControllerAPI::class, 'deleteBayar']);

//OPSI API ROUTE
Route::get('getOpsi', [OpsiControllerAPI::class, 'getOpsi']);
Route::get('showOpsi', [OpsiControllerAPI::class, 'showOpsi']);
Route::post('postOpsi', [OpsiControllerAPI::class, 'createOpsi']);
Route::post('updateOpsi/{opsi:id}', [OpsiControllerAPI::class, 'updateOpsi']);
Route::post('deleteOpsi/{opsi:id}', [OpsiControllerAPI::class, 'deleteOpsi']);

//PEMBAYARAN API ROUTE
Route::get('getPembayaran', [PembayaranControllerAPI::class, 'getPembayaran']);
Route::get('showPembayaran', [PembayaranControllerAPI::class, 'showPembayaran']);
Route::post('postPembayaran', [PembayaranControllerAPI::class, 'createPembayaran']);
Route::post('updatePembayaran/{pembayaran:id}', [PembayaranControllerAPI::class, 'updatePembayaran']);
Route::post('deletePembayaran/{pembayaran:id}', [PembayaranControllerAPI::class, 'deletePembayaran']);

//EXAM API ROUTE
Route::get('getExam', [ExamControllerAPI::class, 'getExam']);
Route::get('showExam', [ExamControllerAPI::class, 'showExam']);
Route::post('postExam', [ExamControllerAPI::class, 'createExam']);
Route::post('updateExam/{exam:id}', [ExamControllerAPI::class, 'updateExam']);
Route::post('deleteExam/{exam:id}', [ExamControllerAPI::class, 'deleteExam']);

//JAWABEXAM API ROUTE
Route::get('getJawabexam', [JawabexamControllerAPI::class, 'getJawabexam']);
Route::get('showJawabexam', [JawabexamControllerAPI::class, 'showJawabexam']);
Route::post('postJawabexam', [JawabexamControllerAPI::class, 'createJawabexam']);
Route::post('updateJawabexam/{jawabexam:id}', [JawabexamControllerAPI::class, 'updateJawabexam']);
Route::post('deleteJawabexam/{jawabexam:id}', [JawabexamControllerAPI::class, 'deleteJawabexam']);

//SOAL API ROUTE
Route::get('getSoal', [SoalControllerAPI::class, 'getSoal']);
Route::get('showSoal', [SoalControllerAPI::class, 'showSoal']);
Route::post('postSoal', [SoalControllerAPI::class, 'createSoal']);
Route::post('updateSoal/{soal:id}', [SoalControllerAPI::class, 'updateSoal']);
Route::post('deleteSoal/{soal:id}', [SoalControllerAPI::class, 'deleteSoal']);
// });
