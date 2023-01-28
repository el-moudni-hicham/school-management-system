<?php
use App\Http\Controllers\HomeController;
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
    return view('auth/login');
});



Route::prefix('admin')->middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    // Route::post('/adduser', [HomeController::class, "adduser"]);
    // Route::get('/user_form', function () {
    //     return view('add_user');
    // });
    Route::get('/profile/show', function () {
        return view('profile.show');
    });
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');
    Route::get('/home', function () {
        return view('home');# return view('dashboard');
    });


    Route::resource('enseignants', 'EnseignantController');
    Route::resource('matieres', 'MatiereController');
    Route::resource('diplomes', 'DiplomeController');
    Route::resource('homes', 'HomeController');

    Route::get('enseignants/{id}/attestation', 'EnseignantController@attestation')
    ->name('attestation');

    Route::get('enseignants/getMatieresEns/{enseignant_id}', 'EnseignantController@getMatieresEns')->name('enseignant.matieres');


    Route::get('enseignants/diplome/create/{enseignant_id}', 'DiplomeController@create')->name('enseignants.create.diplome');

    Route::post('enseignants/diplome/store/{enseignant_id}', 'DiplomeController@store')->name('enseignants.store.diplome');

    Route::get('enseignant/soft/delete/{id}', 'EnseignantController@softDelete')->name('soft.delete');
    Route::get('enseignant/trash', 'EnseignantController@trashedEnseignants')->name('enseignant.trash');

    Route::get('enseignant/back/from/trash/{id}', 'EnseignantController@backFromSoftDelete')->name('enseignant.back.from.trash');
    Route::get('enseignant/delete/from/database/{id}', 'EnseignantController@deleteForEver')->name('enseignant.delete.from.database');
    #Route::get('enseignant/ens_vacataire', 'EnseignantController@ens_vacataire')->name('enseignant.ens_vacataire');
    Route::get('enseignant/show/diplome/{enseignant_Id}','EnseignantController@diplome')->name('enseignants.diplome');
    });

