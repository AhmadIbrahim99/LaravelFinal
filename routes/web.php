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
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function () {

    Route::resource('types', 'TypesController')->except('destroy');
    Route::get('types/{type}/destroy', 'TypesController@destroy')->name('types.destroy');

    Route::resource('schools', 'SchoolsController')->except('destroy');
    Route::get('schools/{school}/destroy', 'SchoolsController@destroy')->name('schools.destroy');

    Route::resource('campuses', 'CampusesController')->except('destroy');
    Route::get('campuses/{campuse}/destroy', 'CampusesController@destroy')->name('campuses.destroy');

    Route::resource('courses', 'CoursesController')->except('destroy');
    Route::get('courses/{course}/destroy', 'CoursesController@destroy')->name('courses.destroy');

});

