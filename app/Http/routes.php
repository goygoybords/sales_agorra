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
    return redirect('/login');
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
    Route::get('/totalClients' , 'ClientController@countClients');
    
    Route::get('/newProposal' , 'ProposalController@newProposal');
    Route::get('/listProposal' , 'ProposalController@getListService');
    Route::post('/postProposal' , 'ProposalController@postProposal');

    Route::get('/dlProposalAttachement/{filename}', 'ProposalController@downloadAttachment');

    Route::get('/newSale'   , 'SalesController@getSalesEntry');
    Route::get('/listSales' , 'SalesController@getSalesList');
    Route::post('/postSales' , 'SalesController@insertSalesRecord');

    Route::post('/getSalesData' ,  'SalesController@getSalesData');

    Route::get('/editSales/{id}' , 'SalesController@editSales');
    Route::post('/editSales/{id}' , 'SalesController@updateSales');

    Route::get('/cancelSales/{id}' , 'SalesController@cancelSales');

    Route::get('/newCollection/{id}', 'SalesController@getCollection');
    Route::get('/exportSales' , 'SalesController@exportSales');


});


