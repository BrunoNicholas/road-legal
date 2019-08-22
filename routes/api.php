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
	'as' 	=> 'api-welcome',
	'uses' 	=> function(){
		return response()->json(['message'=>'Welcome to ' . config('app.name') . ' API system' ]);
	}
]);

Route::apiResource('/api-vehicles','API\CarController');

Route::apiResource('/api-companies','API\CompanyController');

Route::apiResource('/api-users','API\UserController');
Route::apiResource('/user/api-owners','API\OwnerController');
Route::apiResource('/user/api-officers','API\OfficerController');

Route::apiResource('/user/api-accounts','API\AccountController');

Route::apiResource('/user/api-questions','API\QuestionController');