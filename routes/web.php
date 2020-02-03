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

//Ejercicio 2
// Route::get('/', function () {
//     return "Pantalla principal";
// });

// Route::get('/login', function () {
//     return "Login Usuario";
// });

// Route::get('/logout', function () {
//     return "Logout usuario";
// });

// Route::get('/catalog', function () {
//     return "Listado peliculas";
// });

// Route::get('/catalog/show/{id}', function ($id) {
//     return "Vista detalle pelicula ".$id;
// });

// Route::get('/catalog/create', function () {
//     return "Añadir pelicula";
// });

// Route::get('/catalog/edit/{id}', function ($id) {
//     return "Modificar pelicula ".$id;
// });




//EJERCICIO 3

//  Route::get('/videoclub', function () {
//     return view('layouts/master');
//  });



// //EJERCICIO 4
// Route::get('/', function () {
//     return view('home');
// });

// Route::get('/login', function () {
//     return view('auth.login');
// });

// Route::get('/logout', function () {
//     return "Logout usuario";
// });

// Route::get('/catalog', function () {
//     return view('catalog.index');
// });

// Route::get('/catalog/show/{id}', function ($id) {
//     echo "Vista detalle pelicula ".$id;;
//     return view('catalog.show', array('id'=>$id));
// });

// Route::get('/catalog/create', function () {
//     return view('catalog.create');
// });

// Route::get('/catalog/edit/{id}', function ($id) {
//     return view('catalog.edit', array('id'=>$id));
// });



// //EJERCICIOS 1
// //Crea una ruta simple /hola i retorna “Hola món!”.
// Route::get('/hola', function () {
//     return "HOLA MON";
// });


// //Crea una ruta amb paràmetres del tipus /hola/{nom} i retorna “Hola $nom”.
// Route::get('/hola/{nom}', function ($nom) {
//     return "Hola ".$nom;
// });

// //Posa a la view “Benvingut {{$nom}}” i passa el teu nom a la vista.
// Route::get('/inici', function () {
//     return view('inici',$arrayName = array('nom' =>'dylan'));
// });







//CAPITULO 2
Route::get('/videoclub', function () {
     return view('layouts/master');
  });

// Route::get('/login', function () {
//     return view('auth.login');
// });

// Route::get('/logout', function () {
//     return "Logout usuario";
// });

//Route::get('/', 'HomeController@getHome');


Route::get('/catalog', 'CatalogController@getIndex')->middleware('auth');

Route::get('/catalog/show/{id}', 'CatalogController@getShow')->middleware('auth');

Route::get('/catalog/create', 'CatalogController@getCreate')->middleware('auth');

Route::get('/catalog/edit/{id}', 'CatalogController@getEdit')->middleware('auth');
Auth::routes();

Route::get('/', 'HomeController@index')->name('home')->middleware('auth');

Route::post('catalog/create', 'CatalogController@postCreate')->middleware('auth');
Route::put('/catalog/edit/{id}', 'CatalogController@putEdit')->middleware('auth');
Route::put('/catalog/rent/{id}', 'CatalogController@putRent')->middleware('auth');
Route::put('/catalog/return/{id}', 'CatalogController@putReturn')->middleware('auth');
Route::put('/catalog/delete()/{id}', 'CatalogController@deleteMovie')->middleware('auth');



