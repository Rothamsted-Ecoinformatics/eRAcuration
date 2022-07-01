<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CropController;
use App\Http\Controllers\DatasetController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\SubjectController;

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

Route::resource('images', ImageController::class);
Route::resource('datasets', DatasetController::class );
Route::resource('subjects', SubjectController::class);
Route::resource('crops', CropController::class);
Route::GET('datasets/{dataset}/copy', [DatasetController::class, 'copy' ]); //to make a new one from template

#//example of user table
Route::get('user-datatables', function () {
    return view('welcome');
}) ->name('home');

route::get('/about', function() {
    return view('documentation.index');
}) -> name('about');
route::get('/editor', function() {
    return view('documentation.editor');
}) -> name('editor');

route::get('/', function() {
    return view('documentation.index');
});


route::get('/phpinfo', function() {
    return phpinfo();
})->name('phpinfo');





//eRAcurate pages : please list here the pages that are in progress or finished


//eRAcurate TODOS: list the routes that we could have to build the scafolding. 


