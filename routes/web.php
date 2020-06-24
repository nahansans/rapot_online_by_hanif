<?php

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

Route::prefix('dashboard-admin')->middleware(['auth', 'admin'])->group( function (){
    Route::get('/', 'DashboardController@index')->name('dashboard');
    Route::resource('siswa', 'SiswaController');
});
Route::get('/dashboard', 'RapotController@index')->name('rapot')->middleware(['auth', 'siswa']);

Auth::routes(['register' => false]);

Route::get('/', 'HomeController@index')->name('home');
