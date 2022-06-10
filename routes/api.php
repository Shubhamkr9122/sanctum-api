<?php

use App\Http\Controllers\EnjayApiDataController;
use App\Http\Controllers\StudentController;
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

//Public API
/*
Route::get('/students',[StudentController::class,'index']);
Route::get('/students/{id}',[StudentController::class,'showSingleRecord']);
Route::post('/students',[StudentController::class,'storeRecord']);
Route::put('/students/{id}',[StudentController::class,'updateRecord']);
Route::delete('/students/{id}',[StudentController::class,'deleteRecord']);
*/


//Group Routes Contrller
/*
Route::controller(StudentController::class)->group(function(){
    
    Route::get('/students/{id}','showSingleRecord');
    Route::post('/students','storeRecord');
    Route::put('/students/{id}','updateRecord');
    Route::delete('/students','deleteRecord');
});
*/

//API using sanctum,reister and login are public
Route::controller(StudentController::class)->group(function(){
    Route::post('/register','register');
    Route::post('/login','login');
    Route::get('/students','index');
    Route::get('students/{id}','showSingleRecord');
});

//Insert,update,delete are authenticated
Route::middleware('auth:sanctum')->group(function(){
    Route::controller(StudentController::class)->group(function(){
        Route::put('/students/{id}','updateRecord');
        Route::delete('/students/{id}','deleteRecord');
        Route::get('logout','logout');
        


    });
});

Route::post('endpoint/sriramhardware',[EnjayApiDataController::class,'storeData']);
// Route::match(['get','post'],'endpoint/sriramhardware',[EnjayApiDataController::class,'storeData']);
// Route::any('endpoint/sriramhardware',[EnjayApiDataController::class,'storeData']);
// Route::post('endpoint/sriramhardware/{fname?}/{lname?}',function($id=null,$i="Kumar"){
//     return "Hii ". $id." ".$i ;
// });




// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
