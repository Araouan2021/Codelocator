<?php

use Illuminate\Http\Request;
Use App\Record;

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

/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
 
Route::get('records', function() {
    // If the Content-Type and Accept headers are set to 'application/json', 
    // this will return a JSON structure. This will be cleaned up later.
    return Records::all();
});
 
Route::get('records/{id}', function($id) {
    return Record::find($id);
});

Route::post('records', function(Request $request) {
    return Record::create($request->all);
});

Route::put('records/{id}', function(Request $request, $id) {
    $record = Record::findOrFail($id);
    $record->update($request->all());

    return $record;
});

Route::delete('records/{id}', function($id) {
    Record::find($id)->delete();

    return 204;

});
*/

Route::get('records', 'RecordController@index');
Route::get('records/{record}', 'RecordController@show');
Route::post('records', 'RecordController@store');
Route::put('records/{record}', 'RecordController@update');
Route::delete('records/{records}', 'RecordController@delete');