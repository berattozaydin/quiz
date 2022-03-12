<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Nette\Schema\ValidationException;
use Laravel\Sanctum\Sanctum;
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


Route::post('register','UserController@register');
Route::post('login',[UserController::class,'login']);
Route::get('liste',[ApiController::class,'liste']);
/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {

});*/

Route::middleware('auth:sanctum')->group(function(){
    Route::get('user',[UserController::class,'index']);

    Route::get('sorular/{slug}','ApiController@sorular');
    Route::Post('logout','UserController@logout');
});
