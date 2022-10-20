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
    return view('welcome');
})->name('homepage');

// // CRUD: create read update delete
// // metodo(get,post..)+rotta(url) => identificatore univoco

// // PARTE READ
// // Recupero elendo di dipartimenti
// Route::get('/departments', 'DepartmentController@index')->name('departments.index');

// // Recupero singolo dipartimento in base alla chiave primaria
// Route::get('/departments/{id}', 'DepartmentController@show')->name('departments.show');

// // PARTE CREATE
// // Pagina contenente il form da compilare per creare una nuova risorsa
// Route::get('/departments/create', 'DepartmentController@create')->name('departments.create');

// // Pagina a cui inviamo questi dati - salva una nuova risorsa
// Route::post('/departments', 'DepartmentController@store')->name('departments.store');

// // PARTE UPDATE
// // Pagina con il form di modifica di una risorsa in base alla chiave primaria
// Route::get('/departments/{id}/edit', 'DepartmentController@edit')->name('departments.edit');

// // Pagina a cui inviamo la modifica - aggiorna i dati della risorsa in base alla chiave primaria
// Route::put('/departments/{id}', 'DepartmentController@update')->name('departments.update');

// // PARTE DELETE
// // Elimina la risorsa in base alla chiave primaria
// Route::delete('/departments/{id}', 'DepartmentController@destroy')->name('departments.destroy');

// Laravel ci mette a disposizione uno strumento per non scrivere ogni volta (per ogni ririsorsa) tutte queste rotte - altrimenti andrebbe scritta tutta questa roba per ogni tabella del DB praticamente: departments, courses, teachers, students...

// con questo metodo laravel capesce che vogliamo creare il metodo crud e crea tutte le rotte che avevamo fatto precedentemente a mano
// Route::resource('departments', 'DepartmentController');

// php artisan route:list => per verificare che ci siano tutte le rotte

// esistono dei meccanismi per customizzare resource: creare solo alcune rotte, personalizzare i nomi della rotte..

// es: voglio solo index e show
// Route::resource('departments', 'DepartmentController')->only('index', 'show');

//es:: le voglio tutte tranne alcune
// Route::resource('departments', 'DepartmentController')->except(['destroy', 'update', 'edit']);

// docu: https://laravel.com/docs/7.x/controllers#resource-controllers

// Route::resource('students', 'StudentController');

// si può escludere delle rotte facendo ad esempio:
// Auth::routes(['register' => false]);
Auth::routes();

Route::middleware('auth')
    ->prefix('admin')
    ->namespace('Admin')
    ->name('admin.')
    ->group(function () {
        Route::resource('departments', 'DepartmentController');
        Route::resource('students', 'StudentController');
        Route::get('/home', 'HomeController@index')->name('home');
    });
