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

use App\Mail\ContactMail;


route::group(['namespace' => 'Admin', 'prefix' => 'admin'],  function(){

  route::resource('Posts', 'PostsController');

  route::resource('Utilisateur', 'UtilisateurController');

  route::get('post.api', 'PostsController@apiPost')->name('post.api');

  route::get('Utilisateur.api', 'UtilisateurController@apiUser')->name('Utilisateur.api');

  route::get('acceuil', 'AdminPageController@acceuil')->name('acceuil');

});



Route::get('/profil' , 'PageController@profil')->name('profil')->middleware('auth');

Route::get('/account' , 'PageController@account')->name('completprofil')->middleware('auth');

Route::post('/account' , 'PageController@updateimg')->name('completprofil')->middleware('auth');

Route::post('/contact' , 'ContactController@store')->name('contact');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'Home0Controller@index');

Route::get('/index', 'Home0Controller@index')->name('home0');

route::resource('Post', 'PostController');

route::group(['middleware' => ['web']], function (){
    route::resource('Comment', 'CommentController');
});
