<?php

use App\Models\Resep;
use App\Models\ResepDetail;
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

    Route::get('/count/lineChart1', function() {
        $resep = Resep::with('resepDetail')->where('id_user_dokter', auth()->user()->id)->groupBy('tanggal_resep')
            ->get();

        $y1 = $resep->count();
        $y2 = [];
        $x = [];

        foreach ($resep as $key => $item) {
            array_push($x, $item->tanggal_resep->format('Y-m-d'));
            $i = 0;
            foreach($item->resepDetail as $data) {
                $y2[$i] = ++$i;
            }
        }
//        dd($x, $y1, $y2);
       return response()->json(['y1' => $y1, 'y2' => $y2, 'x' => $x]);
    });
});

Route::group(['middleware' => 'apotik', 'prefix' => 'apoteker'], function() {
    Route::get('/dashboard', 'DashboardController@apoteker')->name('dashboard.apoteker');
    Route::get('/resep/{id_resep}', 'ResepController@getResep')->name('resep.getResep');
    Route::get('/resep/{nik}/tebus/{id_resep}/tebus={tebus}', 'ResepController@tebusResep')->name('reseps.tebus');
    Route::get('/medication', 'MedicationController@index')->name('medication.apoteker');
    Route::get('/medication/search', 'MedicationController@searchNik')->name('medication.searchNik');
    Route::get('/my-profile', 'MedicationController@profile')->name('apotekers.profile');
    Route::patch('/my-profile/{id}/update-profile', 'MedicationController@updateProfile')->name('apotekers.updateProfile');
});

Route::group(['middleware' => 'pasien', 'prefix' => 'pasien'], function() {
    Route::get('/dashboard', 'DashboardController@pasien')->name('dashboard.pasien');
    Route::get('/medication', 'MedicationController@indexPasien')->name('medication.index');
    Route::get('/my-profile', 'PasienController@profile')->name('pasiens.profile');
    Route::patch('/my-profile/{id}/update-profile', 'PasienController@updateProfile')->name('pasiens.updateProfile');
    Route::get('/resep/{id_resep}', 'ResepController@getResep')->name('resep.getResep');
});

//Route::resource('apoteks', 'ApotekController');
//
//Route::resource('apotekers', 'ApotekerController');
//
//
//Route::resource('reseps', 'ResepController');
//
//Route::resource('resepDetails', 'ResepDetailController');
