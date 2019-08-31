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

Auth::routes(['verify'=>true]);
Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/newLead', 'LeadController@index')->name('newLead');
Route::post('/newLead','LeadController@insertLead')->name('newLead');
Route::get('/getLeads','LeadController@getLead')->name('getLead');   
Route::post('/delLead','LeadController@deleteLead')->name('delLead');
Route::get('/editLead','LeadController@editLead')->name('editLead');
Route::post('/editLeadContents','LeadController@editLeadContents')->name('editLeadContents');

