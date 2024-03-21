<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginAdmin;
use App\Http\Controllers\QueueController;
use App\Http\Controllers\Monitoring;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\SpvController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('view1',[
//                 "title" => "Login"]);
// });

//admin,supervisor and employee login/logout
Route::get('/',[LoginAdmin::class,'loginPage'])->name('home');
Route::post('/AdminLogin',[LoginAdmin::class,'postLogin'])->name('postLogin');
Route::get('/logoutAdmin',[LoginAdmin::class,'logoutAdmin'])->name('logoutAdmin');
//employee loginform/logout
Route::get('EmployeeLogin',function(){
    return view('employeLog');
})->name('ELoginForm');
Route::get('/logoutEmployee',[LoginAdmin::class,'logoutAdmin'])->name('logoutEmployee');
//supervisor logout
Route::get('/logoutSupervisor',[LoginAdmin::class,'logoutAdmin'])->name('logoutSupervisor');

Route::group(['middleware' => ['auth:user']],function(){
    //admin page route control
    Route::get('/adminPage',[AdminController::class,'Home'])->name('adminHome');
    Route::get('/admin/editEmployee/{id}',[AdminController::class,'edit'])->name('editKaryawan');
    Route::post('/admin/updateEmployee/{id}',[AdminController::class,'update'])->name('updateKaryawan');
    Route::get('/admin/deleteEmployee/{id}',[AdminController::class,'delete'])->name('deleteKaryawan');
    Route::get('/admin/addEmployee',[AdminController::class,'addEmployee'])->name('addKaryawan');
    Route::post('/admin/insertEmployee',[AdminController::class,'insertEmployee'])->name('insertKaryawan');
    Route::get('/admin/manageCategory',[AdminController::class,'manageCategory'])->name('manageCategory');
    Route::get('/admin/editCategory/{id}',[AdminController::class,'editCatsForm'])->name('editCategory');
    Route::post('/admin/updateCategory/{id}',[AdminController::class,'updateCats'])->name('updateCategory');
    Route::get('/admin/deleteCategory/{id}',[AdminController::class,'deleteCats'])->name('deleteCategory');
    Route::get('/admin/addCategory',[AdminController::class,'addCats'])->name('addCategory');
    Route::post('/admin/insertCategory',[AdminController::class,'insertCats'])->name('insertCategory');
    Route::get('/admin/QTracking',[AdminController::class,'QTrack'])->name('Tracking');
    Route::get('/admin/report_on_date',[AdminController::class, 'reportOnDate'])->name('reportOnDate');
    Route::get('/admin/AdminProfile',[AdminController::class,'profile'])->name('AProfile');

    //supervisor page route control
    Route::get('/SupervisorPage',[SpvController::class,'Home'])->name('spvDashboard');
    Route::get('/SupervisorProfile',[SpvController::class,'profile'])->name('SProfile');
    Route::get('/SupervisorEditEmployee',[SpvController::class,'editEmployee'])->name('SEdit');
    Route::get('/Supervisor/editEmployee/{id}',[SpvController::class,'edit'])->name('spvEditKaryawan');
    Route::post('/Supervisor/updateEmployee/{id}',[SpvController::class,'update'])->name('spvUpdateKaryawan');
    Route::get('/Supervisor/skip/{category}',[SpvController::class,'skipp'])->name('spvSkipAction');
    Route::get('/Supervisor/done/{category}',[SpvController::class,'Donee'])->name('spvDoneAction');
    Route::get('/Supervisor/skip/call/{category}',[SpvController::class,'calll'])->name('spvCallAction');
    Route::get('/Supervisor/QTracking',[SpvController::class,'QTrack'])->name('TrackingSpv');
    Route::get('/Supervisor/report_on_date',[SpvController::class, 'reportOnDate'])->name('reportOnDateSpv');

    //employee page route control
    Route::get('/EPage',[EmployeeController::class,'dashboard'])->name('HomeEmployee');
    Route::get('/EPage/skip/{category}',[EmployeeController::class,'skipp'])->name('skipAction');
    Route::get('/EPage/done/{category}',[EmployeeController::class,'Donee'])->name('doneAction');
    Route::get('/EPage/skip/call/{category}',[EmployeeController::class,'calll'])->name('callAction');
    Route::get('/EPage/profile',[EmployeeController::class,'profile'])->name('EProfile');

});

//Queue
Route::get('/category',[QueueController::class,'catHome'])->name('catHome');
Route::get('showQueue/{category}',[QueueController::class,'showIt'])->name('giveIt');

//Monitoring Queue
Route::get('/MonitoringQueue',[Monitoring::class,'monitorQ'])->name('monitoringPage');


