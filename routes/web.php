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
        //routes autorisées uniquement qu'aux utilisateurs connectés

         // route crud (view, create, edit, delete)
         Route::get('/star/add', 'ProfilController@add')->name('add');
         Route::post('/star/list', 'ProfilController@create')->name('create');
         Route::get('/star/list', 'ProfilController@list')->name('list');

         Route::get('/star/edit/{id}', 'ProfilController@edit')->name('edit');
         Route::post('star/edit/{id}', 'ProfilController@creates')->name('creates');
         Route::get('/star/delete/{id}', 'ProfilController@delete')->name('delete');

         Route::get('/home', 'HomeController@index')->name('home');


       });


        // route index page d'acceuil
        // accès public  public des profil des fiches, page d'acceuil
        Route::get('/index', 'AjaxController@index_all')->name('index_all');
        // route Ajax afficher le contenu dynamique des fiches sur la page d'acceuil
        Route::get('/star', 'AjaxController@data_call')->name('data');

        // route retour des datas ajax
         Route::get('/star/data', 'AjaxController@datas')->name('datas');

        // acces login et register users
       Auth::routes();


