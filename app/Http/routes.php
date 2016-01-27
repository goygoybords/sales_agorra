<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () 
{
	$title = "";
    return view('welcome')->with(compact('title'));
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

// Route::group(['middleware' => ['web']], function () {
//     //
// });

Route::group(['middleware' => 'web'], function () 
{
    Route::auth();
    Route::get('/dashboard'   , 'DashboardController@index');
    
    Route::get('/listClients' , 'ClientController@listClients');
    Route::get('/newClient'   , 'ClientController@newClient');
    Route::post('/insertClientRecord' , 'ClientController@insertClientRecord');
    Route::get('/editClient/{id}' , 'ClientController@editClientView');
    Route::post('/editClient/{id}' , 'ClientController@updateClientRecord');

    Route::get('/newProposal' , 'ProposalController@newProposal');


});


