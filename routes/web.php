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


     Route::group(['middleware' => ['auth']], function () {
        //routes autorisées au utilisateurs connectés
        // route pour créer un profil dans les fiches

         Route::get('/star/add', 'ProfilController@add')->name('add');
         Route::post('/star/list', 'ProfilController@create')->name('create');
         // crud sur liste des profil des fiches
         // view sur liste
         // action crud
         Route::get('/star/list', 'ProfilController@list')->name('list');

         Route::get('/star/edit/{id}', 'ProfilController@edit')->name('edit');
         Route::post('star/edit/{id}', 'ProfilController@creates')->name('creates');
         Route::get('/star/delete/{id}', 'ProfilController@delete')->name('delete');
         Route::get('/', 'ProfilController@add')->name('logout');

       });


        // route index page d'acceuil
       // accès public  public des profil des fiches
       Route::get('/', 'ProfilController@index_all')->name('index_all');

     Auth::routes();

     Route::get('/home', 'HomeController@index')->name('home');
