<?php

use App\family;

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
Route::get('/', function() {
    $families = \App\family::all();
    return view('welcome', compact(['families']));
});
Route::get('/family/{id}', 'ViewController@index');
Route::post('/family/{id}/member/{member_id}/increment', 'ViewController@incrementNumber');
Route::get('/manage/{id}', 'ManageController@index');
Route::post('/manage/edit/header', 'ManageController@editHeader');
Route::post('/manage/edit/member', 'ManageController@editMember');
Route::post('/manage/edit/member/uploadphoto', 'ManageController@uploadImage');
Route::post('/manage/edit/member/removephoto', 'ManageController@removeImage');
Route::get('/manage/edit/member/delete/{id}', 'ManageController@removeMember'); 
Route::post('/manage/add/member', 'ManageController@addMember');
