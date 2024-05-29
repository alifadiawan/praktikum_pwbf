<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MasterController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/mahasiswa/mata-kuliah', function () {
    return view('mahasiswa.mk');
});
Route::get('/mahasiswa/kelas', function () {
    return view('mahasiswa.kelas');
});
Route::get('/mahasiswa/dosen', function () {
    return view('mahasiswa.dosen');
});


// // mahasiswa view
Route::get('/mahasiswa', [MasterController::class, 'mastermahasiswa']);
Route::POST('/store', [MasterController::class, 'store']);
Route::GET('/reset', [MasterController::class, 'reset']);
// Route::GET('/edit/{index}', [MasterController::class, 'edit'])->name('mahasiswa.edit');
// Route::put('/update/{index}', [MasterController::class, 'update'])->name('mahasiswa.update');
Route::POST('/submitMahasiswa', [MasterController::class, 'submitMahasiswa'])->name('mahasiswa.store');


Route::GET('/edit/{edit}', [MasterController::class, 'edit'])->name('mahasiswa.edit');
Route::put('/update/{id}', [MasterController::class, 'updateMahasiswa'])->name('mahasiswa.update');

Route::GET('/delete/{id}', [MasterController::class, 'deleteMahasiswa'])->name('mahasiswa.delete');
Route::POST('/delete', [MasterController::class, 'hapus'])->name('mahasiswa.hapus');

