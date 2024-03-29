<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/heritages', 'Api\CulturalHeritage\CulturalHeritageController@getAllHeritage');
Route::get('/heritages/{id}', 'Api\CulturalHeritage\CulturalHeritageController@getHeritageId');
Route::post('/post', 'Api\CulturalHeritage\CulturalHeritageController@inputData');
Route::get('/heritagesFilter', 'Api\CulturalHeritage\CulturalHeritageController@getAllHeritageByFilter');
