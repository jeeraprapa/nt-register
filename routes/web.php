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

Route::group([
	'middleware' => ['web']
],
	function () {

		Route::get('/', 'RegisterController@register')
		     ->name('register');

		Route::post('/store', 'RegisterController@store')
		     ->name('store');

		Route::get('/question/{slug}', 'QuestionController@index')
		     ->name('question');

		Route::post('/question/{slug}/store', 'QuestionController@store')
		     ->name('question.store');
	}
);
