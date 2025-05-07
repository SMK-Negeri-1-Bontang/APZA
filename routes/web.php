<?php


    use App\Http\Controllers\KelasController;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AbsenController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KehadiranChartController;
use App\Http\Controllers\LaporanIzinController;


Route::get('/', function () {
    return view('welcome');
});



// Admin-only route
Route::middleware(['auth', RoleMiddleware::class . ':admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return 'Selamat datang di dashboard admin!';
    });
});


Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware(['auth', 'verified'])->name('dashboard.index');

Route::get('/', function () {
    return view('welcome');
})->middleware(['auth', 'verified'])->name('welcome');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
    Route::post('/register', [UserController::class, 'create'])->name('register');
    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');
//absen
    Route::get('/absen', [AbsenController::class, 'index'])->name('absen.index');
    Route::get('/absen/create', [AbsenController::class, 'create'])->name('absen.create');
    Route::post('/absen', [AbsenController::class, 'store'])->name('absen.store');
    Route::get('/absen/{absen}', [AbsenController::class, 'show'])->name('absen.show');
    Route::get('/absen/edit/{id}', [AbsenController::class, 'edit'])->name('absen.edit');
    Route::patch('/absen/update/{id}', [AbsenController::class, 'update'])->name('absen.update');
    Route::delete('/absen/{id}', [AbsenController::class, 'destroy'])->name('absen.destroy');
    Route::get('/absen/tampilkan-siswa/', [AbsenController::class, 'tampilkanSiswa'])->name('absen.tampilkan-siswa');   
   
    Route::get('/absen/input/', [AbsenController::class, 'input'])->name('absen.input');
    Route::post('/absen/simpan', [AbsenController::class, 'simpan'])->name('absen.simpan');

    Route::resource('berita', BeritaController::class);

   

   
    });
    
   
    
    
    

    
 

Route::get('/kehadiran-chart', [KehadiranChartController::class, 'index'])->name('kehadiran.chart');



Route::get('/jurusan', [JurusanController::class, 'index'])->name('jurusan.index');
Route::get('/jurusan/create', [JurusanController::class, 'create'])->name('jurusan.create');
Route::post('/jurusan', [JurusanController::class, 'store'])->name('jurusan.store');
Route::get('/jurusan/{jurusan}', [JurusanController::class, 'show'])->name('jurusan.show');
Route::get('/jurusan/edit/{id}', [JurusanController::class, 'edit'])->name('jurusan.edit');
Route::patch('/jurusan/update/{id}', [JurusanController::class, 'update'])->name('jurusan.update');
Route::delete('/jurusan/{jurusan}', [JurusanController::class, 'destroy'])->name('jurusan.destroy');

Route::get('/laporan-izin', [LaporanIzinController::class, 'index'])->name('izin.index');



//izin
Route::post('/laporan-izin', [LaporanIzinController::class, 'store'])->name('laporan-izin.store');
Route::patch('/izin/update/{id}', [LaporanIzinController::class, 'update'])->name('izin.update');
Route::put('/laporan-izin/{id}/verifikasi', [LaporanIzinController::class, 'verifikasi'])->name('laporan-izin.verifikasi');
Route::delete('/izin/{id}', [LaporanIzinController::class, 'destroy'])->name('izin.destroy');
Route::get('/izin/{id}/show', [LaporanIzinController::class, 'show'])->name('izin.show');
Route::get('/izin-saya', [LaporanIzinController::class, 'izinSaya'])->middleware('auth')->name('izin.saya');


//absen



//class

Route::get('/kelas', [KelasController::class, 'index'])->name('kelas.index');
Route::get('/kelas/create', [KelasController::class, 'create'])->name('kelas.create');
Route::post('/kelas', [KelasController::class, 'store'])->name('kelas.store'); 
Route::delete('/kelas/{id}', [KelasController::class, 'destroy'])->name('kelas.destroy');
Route::get('/kelas/edit/{id}', [KelasController::class, 'edit'])->name('kelas.edit');
Route::put('/kelas/update/{id}', [KelasController::class, 'update'])->name('kelas.update');

Route::get('/get-kelas/{jurusan_id}', [UserController::class, 'getKelas']);







require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function () {
  // TEMPORER UNTUK TEST
Route::get('/absen/pilih_kelas', [AbsenController::class, 'pilih_kelas'])->name('absen.pilih_kelas');

});
