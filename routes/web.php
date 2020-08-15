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
Route::get('/', function () {
    return view('welcome2');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'dokter', 'prefix' => 'dokter'], function() {
    Route::get('/dashboard', 'DashboardController@dokter')->name('dashboard.dokter');
    Route::get('/my-profile', 'DokterController@profile')->name('dokters.profile');
    Route::resource('pasiens', 'PasienController');
    Route::get('/resep/{id_resep}', 'ResepController@getResep')->name('resep.getResep');
    Route::get('pasiens/{id_pasien}/resep/create', 'ResepController@create')->name('reseps.create');
    Route::post('pasiens/{id_pasien}/resep/store', 'ResepController@store')->name('reseps.store');
    Route::patch('dokters/{id}/update-profile', 'DokterController@updateProfile')->name('dokters.updateProfile');
    Route::resource('dokters', 'DokterController')->only('edit', 'update');
    Route::resource('obats', 'ObatController');
});

Route::group(['middleware' => 'apotik', 'prefix' => 'apoteker'], function() {
    Route::get('/dashboard', 'DashboardController@apoteker')->name('dashboard.apoteker');
    Route::get('/resep/{id_resep}', 'ResepController@getResep')->name('resep.getResep');
    Route::get('/resep/{nik}/tebus/{id_resep}/tebus={tebus}', 'ResepController@tebusResep')->name('reseps.tebus');
    Route::get('/medication', 'MedicationController@index')->name('medication.index');
    Route::get('/medication/search', 'MedicationController@searchNik')->name('medication.searchNik');
    Route::get('/my-profile', 'MedicationController@profile')->name('apotekers.profile');
    Route::patch('/my-profile/{id}/update-profile', 'MedicationController@updateProfile')->name('apotekers.updateProfile');
});


//Route::resource('apoteks', 'ApotekController');
//
//Route::resource('apotekers', 'ApotekerController');
//
//
//Route::resource('reseps', 'ResepController');
//
//Route::resource('resepDetails', 'ResepDetailController');
