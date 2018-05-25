<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/project', function() {
return response("OK", 200);
});


Route::get('/project', function (){
    return view('/project');
});

Route::get('/project', 'ProjectController@titleList');

Route::get('/project/{id}', 'ProjectController@detailDescriptive');

//route pour créer un projet
Route::get('/formulaire_projet', 'ProjectController@createProject')->middleware('auth');

//route pour remplir et valider le formulaire
Route::post('/project', 'ProjectController@storeProject')->middleware('auth');

//route pour modifier un projet
Route::get('/modification/{id}', 'ProjectController@editProject')->middleware('auth');

Route::put('/project/{id}', 'ProjectController@updateProject')->middleware('auth');

