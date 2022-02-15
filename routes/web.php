<?php

use Whoops\Run;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Guess\LogoutController;
use App\Http\Controllers\Backend\LevelController;
use App\Http\Controllers\Forgot\ForgotController;
use App\Http\Controllers\Backend\ParentController;
use App\Http\Controllers\Backend\ProfilController;
use App\Http\Controllers\Backend\FacultyController;
use App\Http\Controllers\Backend\StudentController;
use App\Http\Controllers\Backend\DepartmentController;
use App\Http\Controllers\Recycle\LevelRecycleController;
use App\Http\Controllers\Recycle\FacultyRecycleController;
use App\Http\Controllers\Recycle\StudentRecycleController;
use App\Http\Controllers\Recycle\DepartmentRecycleController;
use Illuminate\Cache\Console\ForgetCommand;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function(){ return view('home'); })->name('home');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('home');
})->name('dashboard');

Route::get('unauthorize', function(){ return view('responses.unauthorize'); })->name('unauthorize');

//Route::get('parent', function(){ return view('xela.xiale'); })->name('parent')->middleware('age');

Route::get('parent', [ParentController::class, 'parent'])->name('parent');
Route::get('logout', [LogoutController::class, 'logout'])->name('logout');

Route::get('information', function(){ return view('forgot_password.information'); })->name('information');
Route::post('changeprofil', [ProfilController::class, 'forgetAttrib'])->name('changeprofil');

//Route::get('student/deleteStudent/{id}', [StudentController::class, 'deleteStudent'])->name('deleteStudent');

Route::resource('students', StudentController::class);
Route::get('/deleteStudent/{id}', [StudentController::class, 'recycleStudent'])->name('student.recycle');
Route::get('/recycleStudent', [StudentRecycleController::class, 'index'])->name('allStudentsRecycle');
Route::get('presentRestoreStudent/restorationStudent/{id}', [StudentRecycleController::class, 'restorationStudent'])->name('restorationStudent');
Route::get('presentFinaleDeleteStudents/finaleDelete/{id}', [StudentRecycleController::class, 'finaleDelete'])->name('finaleDelete');

//Faculty

Route::resource('faculty', FacultyController::class);
Route::get('/deleteFaculty/{id}', [FacultyController::class, 'deleteFaculty'])->name('faculte.recycle');
Route::get('/recycleFaculty', [FacultyRecycleController::class , 'index'])->name('allFacultyRecycle');
Route::get('presentRestore/restoreFaculty/{id}', [FacultyRecycleController::class, 'restoreFaculty'])->name('restoreFaculty');
Route::get('presentDeleleFinal/finalDeleteFacullty/{id}', [FacultyRecycleController::class, 'finalDeleteFacullty'])->name('finalDeleteFacullty');

// Level

Route::resource('levels', LevelController::class);
Route::get('/deleteLevel/{id}', [LevelController::class, 'deleteLevel'])->name('deleteLevel.recycle');
Route::get('/recycleLevel', [LevelRecycleController::class, 'index'])->name('allLevelRecycle');
Route::get('presentRestoreLevel/restoreLevel/{id}', [LevelRecycleController::class , 'restoreLevel'])->name('restoreLevel');
Route::get('presentDeletelevelFinal/deleteFinalLevel/{id}', [LevelRecycleController::class, 'deleteFinalLevel'])->name('deleteFinalLevel');

// Department

Route::resource('departments', DepartmentController::class);
Route::get('/deleteDepartment/{id}', [DepartmentController::class, 'deleteDepartment'])->name('recycle.department');
Route::get('/recycledepartments', [DepartmentRecycleController::class, 'index'])->name('allDpartmentsRecyle');
Route::get('restore_daprtment/departmentRestore/{id}', [DepartmentRecycleController::class , 'departmentRestore'])->name('departmentRestore');
Route::get('finalDeleteDepart/finaleDeleteDepart/{id}', [DepartmentRecycleController::class, 'finaleDeleteDepart'])->name('finaleDeleteDepart');

//
Route::get('forgot', [ForgotController::class, 'index'])->name('forgot.index');

Route::post('forgot', [ForgotController::class, 'updatepassword'])->name('forgot.store');
