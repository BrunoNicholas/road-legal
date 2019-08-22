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

Route::get('/', [
	'as' 	=> 'awelcome',
	'uses' 	=> function(){
		return response()->json(['message'=>'Welcome to ' . config('app.name') . ' API system' ]);
	}
]);

Route::apiResource('/user/api-accounts','API\AccountController');
Route::apiResource('/api-vehicles','API\CarController');
Route::apiResource('/user/api-questions','API\QuestionController');
Route::apiResource('/user/api-questions','API\UserController');