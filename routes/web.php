<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\AboutController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tentang', function () {
    return view('tentang');
});

Route::get('/berita', function () {
    return view('berita');
});
Route::get('/berita', 'NewsController@berita')->name('berita');
Route::get('/berita', [NewsController::class, 'berita'])->name('berita');
Route::get('/berita/{id}', [NewsController::class, 'show'])->name('berita.show');

Route::get('/galeri', function () {
    return view('galeri');
});

Route::get('/kontak',function () {
    return view('kontak');
});

Route::get('/news', function () {
    return view('login');
})->middleware('auth');

Route::get('/', [HomeController::class, 'index']);
Route::get('/news', [NewsController::class, 'index'])->name('news.index');

// Tambah Berita
Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
Route::post('/news', [NewsController::class, 'store'])->name('news.store');

// Edit Berita
Route::get('/news/{id}/edit', [NewsController::class, 'edit'])->name('news.edit');
Route::put('/news/{id}', [NewsController::class, 'update'])->name('news.update');

// Hapus Berita
Route::delete('/news/{id}', [NewsController::class, 'destroy'])->name('news.destroy');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

//logout
Route::get('/logout', function () {
    return view('auth.logout');
})->name('logout.page');

Route::post('logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

Route::get('/gallery.admin', [GalleryController::class, 'index'])->name('gallery.index');

// Tambah Berita
Route::resource('gallery', GalleryController::class);
Route::get('/gallery/create', [GalleryController::class, 'create'])->name('gallery.create');
Route::post('/gallery', [GalleryController::class, 'store'])->name('gallery.store');
Route::delete('/gallery/{id}', [GalleryController::class, 'destroy'])->name('gallery.destroy');

Route::get('/user/gallery', [GalleryController::class, 'showGallery'])->name('gallery.show');
Route::get('user/gallery-more', [GalleryController::class, 'showMore']);

Route::post('/kontak', [KontakController::class, 'store'])->name('kontak.store');

Route::get('/setting/edit', [SettingController::class, 'edit'])->name('settings.edit');
Route::post('setting/update', [SettingController::class, 'update'])->name('settings.update');

Route::resource('about', AboutController::class);


