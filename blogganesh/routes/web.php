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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/login', 'LoginController@loginUser')->name('logincheck');
Route::post('/register', 'LoginController@registerUser')->name('registerUser');
Route::get('/createblog', function()
{
	if(session('username') != '')
	{
		return view('createblog' ,['page' => 'create']);
	}
	else
	{
		return view('login');
	}
});

Route::post('/createblog', 'BlogController@CreateNew');
Route::post('/allblogs', 'BlogController@allBlogs');
Route::post('/updateblogs', 'BlogController@updateBlogs');
Route::post('/blogsbyuser', 'BlogController@BlogsByUser');


