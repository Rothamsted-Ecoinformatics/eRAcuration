<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CropController;
use App\Http\Controllers\DatasetController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\UpdateController;
use App\Http\Controllers\ExperimentController;
use App\Http\Controllers\newmarkerController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\UrequestController;

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
Route::resource('updates', UpdateController::class);
Route::resource('experiments', ExperimentController::class);
Route::resource('urequests', UrequestController::class);
Route::get('datasets/{dataset}/copy', [DatasetController::class, 'copy' ]); //to make a new one from template


Route::get('users', [newmarkerController::class,'show']) ->name('users');
Route::get('downloads',[DownloadController::class,'show']) ->name('downloads');


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


