<?php

use App\Controller\Admin\AdminDashboard;
use App\Controller\Admin\ExamController;
use App\Controller\Admin\RoomController;
use App\Controller\Admin\SittingArrangementController;
use App\Controller\Admin\StudentController;
use App\Controller\Admin\SupervisorController;
use App\Controller\Auth\Auth;
use App\Controller\Home;
use System\Routes\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteProvider within the app. Now create something great!
|
*/
Route::get('/', [Home::class, 'index']);
Route::get('user/tour', [Home::class, 'tour']);
Route::get('user/security/password/change', [Home::class, 'changePassword']);
// auth route

Route::post('api/auth/user', [Auth::class, 'authenticate']);
Route::get('api/auth/user/logout', [Auth::class, 'logout']);
Route::post('api/auth/user/password/reset', [Auth::class, 'resetPassword']);


// admin routes


Route::group(['prefix' => 'dashboard'], function(){
    
    Route::get('/', [AdminDashboard::class, 'index']);

    // admin / student routes
    Route::get('/students/add', [StudentController::class, 'create']);
    Route::post('/students/store', [StudentController::class, 'store']);
    Route::get('/students/list', [StudentController::class, 'index']);

    // admin / rooms routes

    Route::get('/rooms/add', [RoomController::class, 'create']);
    Route::post('/rooms/store', [RoomController::class, 'store']);
    Route::get('/rooms/list', [RoomController::class, 'index']);
    Route::get('/rooms/{room_id}/add-seats', [RoomController::class, 'addSeats']); 
    Route::post('/room/seats/store', [RoomController::class, 'storeSeatInRoom']);
    Route::post('/room/seats/reset', [RoomController::class, 'resetSeatsInRoom']);

    // admin / supervisors' routes
    Route::get('/supervisors/add', [SupervisorController::class, 'create']);
    Route::post('/supervisors/store', [SupervisorController::class, 'store']);
    Route::get('/supervisors/list', [SupervisorController::class, 'index']);

    // admin / exam routes
    Route::get('/exams/add', [ExamController::class, 'create']);
    Route::get('/supervisor/{sup_id}/exams', [ExamController::class, 'examsForSupervisor']);
    Route::get('/exam/supervisor/{sup_id}', [ExamController::class, 'supervisorsForExam']);
    Route::post('/exams/store', [ExamController::class, 'store']);
    Route::get('/exams/list', [ExamController::class, 'index']);
    Route::post('/seats/allocate', [SittingArrangementController::class, 'allocateSeatsToStudents']);
    Route::get('/seats/allocation', [SittingArrangementController::class, 'index']);
    Route::get('/seats/exam/{exam_id}/arrangement', [SittingArrangementController::class, 'vewSittingArrangment']);

    // admin / user routes
    Route::get('/users', [AdminDashboard::class, 'users']);
    Route::post('/users/add', [AdminDashboard::class, 'addUser']);

    //settings
    Route::get('/user/settings', [AdminDashboard::class, 'userProfile']);
});