<?php

use App\Http\Controllers\baru;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GaleriController;

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

// Route::get('/', function () {
//     return view('home', [
//         'title' => 'Home',
//     ]);
// });

// Route::get('/ichigo', function () {
//     return view('ichigo', [
//         'title' => 'Ichigo',
//         'desc' => 'Near the very end of their life or death encounter,
//         Yhwach is momentarily stopped by an arrow shot by Uryu, giving Ichigo
//         the chance to strike Yhwach with Tensa Zangetsu. As the surface of the sword cracks,
//         Ichigo hammers home a single strike with the Zangetsu that appears from within.'
//     ]);
// });

// Route::get('/aizen', function () {
//     return view('aizen', [
//         'title' => 'Aizen',
//         'desc' => 'Aizen was the captain of Squad 5 until
//         he was found guilty of high treason and imprisoned in the Muken.
//         Since the extent of his Spiritual Pressure is unknown,
//         Yhwach regards him as a special threat and dangerous force to be reckoned with.'
//     ]);
// });

// Route::get('/yamamoto', function () {
//     return view('yamamoto', [
//         'title' => 'Yamamoto',
//         'desc' => 'Since no one able to best him has appeared,
//         Genryusai has been the Head Captain of the 13 Court Guard Squads for over a thousand years.
//         He has unfinished business with Yhwach from the war between the Quincies
//         and the Soul Reapers that began a thousand years prior.'
//     ]);
// });

// Route::get('/yhwach', function () {
//     return view('yhwach', [
//         'title' => 'Yhwach',
//         'desc' => 'Yhwach is the emperor of the Vandenreich,
//         father to all Quincies,and invader of the Soul Society.
//         He has the ability to look into the future,
//         as well as powers of transformation and soul distribution.
//         He and Genryusai have a history of hostility that dates back a thousand years.'
//     ]);
// });

// Route::get('/shunsui', function () {
//     return view('shunsui', [
//         'title' => 'Shunsui',
//         'desc' => 'Shunsui is promoted to Head Captain of the 13 Court Guard Squads
//         after the death of Genryusai Yamamoto.He devises many plans to fight the Quincies,
//         and he and Nanao fight together on the front lines, with Shunsui even unleashing his Bankai.'
//     ]);
// });

Route::get('/buku', [BukuController::class, 'index']);
Route::get('/buku/create', [BukuController::class, 'create'])->name('buku.create');
Route::post('buku', [BukuController::class, 'store'])->name('buku.store');

Route::post('/buku/delete/{id}', [BukuController::class, 'destroy'])->name('buku.destroy');   

Route::get('/buku/update/{id}', [BukuController::class, 'edit'])->name('buku.edit');
Route::post('/buku/update/{id}', [BukuController::class, 'update'])->name('buku.update');

Route::get('buku/search', [BukuController::class, 'search'])->name('buku.search');

Route::get('/', [baru::class, 'tampil_home']);
Route::get('/ichigo', [baru::class, 'tampil_ichigo']);
Route::get('/aizen', [baru::class, 'tampil_aizen']);
Route::get('/yamamoto', [baru::class, 'tampil_yamamoto']);
Route::get('/yhwach', [baru::class, 'tampil_yhwach']);
Route::get('/shunsui', [baru::class, 'tampil_shunsui']);

Auth::routes();
Route::get('/user', [UserController::class, 'index'])->name('user.index');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/galeri', [GaleriController::class, 'index']);
Route::get('/galeri/create', [GaleriController::class, 'create'])->name('galeri.create');
Route::post('/galeri', [GaleriController::class, 'store'])->name('galeri.store');
Route::get('/galeri/edit/{id}', [GaleriController::class, 'edit'])->name('galeri.edit');
Route::post('/galeri/update/{id}', [GaleriController::class, 'update'])->name('galeri.update');
Route::post('/galeri/destroy/{id}', [GaleriController::class, 'destroy'])->name('galeri.destroy');

Route::get('/detail_buku/{bukuSeo}', [BukuController::class, 'galbuku'])->name('buku.detail_buku');