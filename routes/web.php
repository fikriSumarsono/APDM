<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\PengabdiansController;
use App\Http\Controllers\LaporanPengabdian;
use App\Http\Controllers\ResearchsController;
use App\Http\Controllers\HaksController;
use App\Http\Controllers\LektorsController;
use App\Http\Controllers\JournalsController;
use App\Http\Controllers\CreationsController;
use App\Http\Controllers\ProsidingsController;
use App\Http\Controllers\AcademiksController;
use App\Http\Controllers\KetuaProdi;
use App\Http\Controllers\PerbaikansController;
use App\Http\Controllers\LanjutansController;
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

Route::get('/', function () {
    return view('index');
})->name('login');
//login
Route::post('/Postlogin',[LoginController::class,'Postlogin'])->name('Postlogin');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');
//dosen
//Route::get('/lektors',[LektorsController::class,'index']);
//Route::get('/lektors/create',[LektorsController::class,'create']);


Route::group(['middleware'=>['auth','ceklevel:admin,Dosen,Dosen dan LPPM,Dosen dan Ketua Prodi,Dosen dan Penjamin Mutu']],function(){
    Route::get('/Dosen',[PagesController::class,'index'])->name('Dosen');
    Route::get('/LPPM',[PagesController::class,'LPPM'])->name('LPPM');
    Route::get('/KetuaProdi',[KetuaProdi::class,'KetuaProdi'])->name('KetuaProdi');
    Route::get('/PenjaminMutu',[PagesController::class,'PenjaminMutu'])->name('PenjaminMutu');
    //usulan baru
    Route::get('/researchs',[ResearchsController::class, 'index']);
    Route::get('/researchs/create',[ResearchsController::class, 'create']);
    Route::post('/researchs',[ResearchsController::class, 'store']);

    //
    Route::get('/pengabdians',[PengabdiansController::class, 'index']);
    Route::get('/pengabdians/create',[PengabdiansController::class, 'create']);
    Route::post('/pengabdians',[PengabdiansController::class, 'store']);

    //HKI
    Route::resource('haks',HaksController::class);
    //jurnal
    Route::resource('journals',JournalsController::class);
    //karyamonumental
    Route::resource('creations',CreationsController::class);
    //prosidi
    Route::resource('prosidings',ProsidingsController::class);
    //naskah
    Route::resource('academiks',AcademiksController::class);
    //buku
    Route::resource('books',BooksController::class);
    //
    Route::get('/sinta',[PagesController::class, 'sinta']);
    //
    Route::get('/riwayatPenelitian',[PagesController::class, 'riwayatPenelitian']);
    Route::get('/riwayatPengabdian',[PagesController::class, 'riwayatPengabdian']);
    Route::get('/TemplatePenelitian',[PagesController::class, 'Tpenelitian']);
    Route::get('/TemplatePengabdian',[PagesController::class, 'Tpengabdian']);
    //
    Route::get('/gantiPassword',[LoginController::class,'gantiPassword'])->name('ganti_password');
    Route::post('/simpanpassword/{user}',[LoginController::class,'simpanpassword']);
    //usulan lanjutan
    Route::get('/UsulanLanjutan',[PagesController::class, 'lanjutan']);
    Route::post('/lanjutans',[LanjutansController::class, 'store']);
    //perbaikan usulan
    Route::get('/PerbaikanUsulan',[PagesController::class, 'perbaikan']);
    Route::post('/KirimPerbaikan',[PagesController::class, 'PerbaikanUpdate']);
    //laporan kemajuan
    Route::get('/LaporanKemajuan',[PagesController::class, 'kemajuan']);
    Route::post('/KirimKemajuan',[PagesController::class, 'KemajuanUpdate']);
    //laporan akhir
    Route::get('/LaporanAkhir',[PagesController::class, 'akhir']);
    Route::post('/KirimAkhir',[PagesController::class, 'AkhirUpdate']);
    //usulan lanjutan
    Route::get('/LanjutanPengabdian',[LaporanPengabdian::class, 'lanjutan']);
    Route::post('/lanjutansPengabdian',[LaporanPengabdian::class, 'simpan']);
    //
    Route::get('/PerbaikanPengabdian',[LaporanPengabdian::class, 'perbaikan']);
    Route::post('/perbaik/{perbaikan}',[LaporanPengabdian::class, 'update']);
    //
    Route::get('/KemajuanPengabdian',[LaporanPengabdian::class, 'kemajuan']);
    Route::post('/KemajuanKirim',[LaporanPengabdian::class, 'KemajuanUpdate']);
    //
    Route::get('/AkhirPengabdian',[LaporanPengabdian::class, 'akhir']);
    Route::get('/AkhirKirim',[LaporanPengabdian::class, 'AkhirUpdate']);
    //
    Route::post('/perbaikans/{perbaikan}',[PerbaikansController::class, 'update']);
    
    
});

Route::group(['middleware'=>['auth','ceklevel:Dosen dan LPPM']],function(){
    Route::get('/LPPM',[PagesController::class,'LPPM'])->name('LPPM');
    Route::resource('lektors',LektorsController::class);
    //
    Route::get('/ResetPassword',[LoginController::class,'resetPassword'])->name('reset_password');
    Route::post('/simpanReset/{user}',[LoginController::class,'passwordReset']);
    Route::post('/simpanregistrasi',[LoginController::class,'simpanregistrasi'])->name('simpanregistrasi');
});

Route::group(['middleware'=>['auth','ceklevel:Dosen dan Ketua Prodi']],function(){
    Route::get('/KetuaProdi',[KetuaProdi::class,'KetuaProdi'])->name('KetuaProdi');
    //
    Route::get('/PengusulanPenelitian',[PagesController::class, 'penelitian']);
    Route::post('/researchs/{research}',[ResearchsController::class, 'update']);
    //
    Route::get('/PengusulanPengabdian',[PagesController::class, 'pengabdian']);
    Route::post('/pengabdians/{pengabdian}',[PengabdiansController::class, 'update']);
    //
    Route::get('/Kpenelitian',[PagesController::class, 'Kpenelitian']);
    Route::get('/Kpengabdian',[PagesController::class, 'Kpengabdian']);
    //
    Route::get('/Apenelitian',[PagesController::class, 'Apenelitian']);
    Route::get('/Apengabdian',[PagesController::class, 'Apengabdian']);
    //
    Route::post('/perbaikans',[PerbaikansController::class, 'store']);
    Route::post('/perbaik',[LaporanPengabdian::class, 'store']);
    //
    Route::get('/PenelitianLanjutan',[PagesController::class,'lihatLanjutanPenelitian']);
    Route::get('/PengabdianLanjutan',[PagesController::class,'lihatLanjutanPengabdian']);


    
});

Route::group(['middleware'=>['auth','ceklevel:Dosen dan Penjamin Mutu']],function(){
    Route::get('/PenjaminMutu',[PagesController::class,'PenjaminMutu'])->name('PenjaminMutu');
    Route::get('/LaporanPenelitian',[PagesController::class, 'Lpenelitian']);
    Route::get('/LaporanPengabdian',[PagesController::class, 'Lpengabdian']);
    
});
