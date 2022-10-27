<?php

use App\Http\Controllers\ActionController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\MenuActivityController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\MenuToRoleController;
use App\Http\Controllers\PermissionAccess;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PurchaseCotroller;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RequisitionCotroller;


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
// Get Requisition  Index

// Route::middleware(['middleware' => 'auth'])->group(function () {

//     Route::get('role', [RoleController::class, 'index'])->name('role.list');
//     Route::post('role', [RoleController::class, 'store'])->name('role.store');

//     Route::get('role/{uniqueId}', [RoleController::class, 'edit'])->name('role.edit');
//     Route::post('role/{uniqueId}', [RoleController::class, 'update'])->name('role.update');

//     Route::get('access', [PermissionAccess::class, 'access'])->name('permission.access');


//     Route::get('menus', [MenuController::class, 'index'])->name('menu.index');

//     Route::get('action', [ActionController::class, 'index'])->name('action.index');

//     Route::get('menuActivity', [MenuActivityController::class, 'permission'])->name('activity.paremission');
//     Route::post('menuActivity', [MenuActivityController::class, 'store'])->name('activity.store');

//     // Get all access for a user role
//     Route::get('allAccess', [MenuToRoleController::class, 'index'])->name('all.access.index');

//     // Get All Index
//     Route::get('departments', [DepartmentController::class, 'index'])->name('department.index');
    
    

//     Route::get('allRole', [RoleController::class, 'allRole'])->name('role.all.role');

//     Route::get('user', [UserController::class, 'index'])->name('user.data');
    
// });
