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
    return view('registration');
});

Route::get('/login', function() {
    return view('login');
});

Route::get('/menu', function () {
    return view('menu');
});

Route::get('/books', function() {
    return view('books');
});

Route::get('/shelves', function() {
    return view('shelves');
});

Route::get('/add_books', function() {
    return view('addBook');
});

Route::get('/createUser', 'UserController@createUser');

Route::post('/loginRequest', 'UserController@login');

Route::post('/getBookList', 'BookController@getBooks');

Route::post('/addBook', 'BookController@store');

Route::post('/getListOfShelves', 'BookController@getShelves');

Route::post('/setShelf', 'BookController@setShelf');

Route::post('/borrowBook', 'BookController@borrowBook');
