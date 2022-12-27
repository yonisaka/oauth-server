<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth:api', 'scopes:get-user'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->get('/logout', function (Request $request) {
    $user = $request->user();
    $accessToken = $user->token();
    DB::table('oauth_refresh_tokens')
    ->where('access_token_id', $accessToken->id)
    ->delete();
    $user->token()->delete();


    return response()->json([
        'message' => 'Successfully logged out',
        'session' => session()->all()
    ]);
});
