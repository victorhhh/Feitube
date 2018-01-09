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

Route::get('/', function () {
    $videos = \App\Video::all();
    $videos->each(function ($videos){
        $videos->user;
        $videos->tags;
    });
    //$tags = Tag::all()->pluck('nombre');


    return view('welcome')->with('videos', $videos);
})->name('principal');

Route::resource('/usuarios', 'UserController');
Route::resource('/videos', 'VideoController');

Route::get('prueba', function (){
    return view('registrar');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/reproducir/{id?}',[
   'uses' => 'ReproductorController@index',
    'as' => 'reproducir.play'
]);
Route::get('videoPropios/{user_id?}', [
    'uses' => 'VideosPropiosController@index',
    'as' => 'videos.propios'
]);
Route::get('/recientes', [
    'uses' => 'VideosPropiosController@recientes',
    'as' =>'videos.recientes'
]);
Route::resource('/importar', 'XmlController');

Route::get('admin/auth/login', [
    'uses'  => 'Auth\LoginController@showLoginForm',
    'as'    => 'admin.auth.login'
]);

Route::post('admin/auth/login', [
    'uses'  => 'Auth\LoginController@login',
    'as'    => 'admin.auth.login'
]);

Route::get('admin/auth/logout', [
    'uses'  => 'Auth\LoginController@logout',
    'as'    => 'admin.auth.logout'
]);
Auth::routes();
