<?php

use App\Http\Controllers\ActionController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CustomerTypeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ItemMasterController;
use App\Http\Controllers\ActivityMenuController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\MenuToRoleController;
use App\Http\Controllers\PermissionAccess;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PosTransactionController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RegisterSellController;
use App\Http\Controllers\RequisitionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SellTransactionController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VatController;
use App\Http\Controllers\VendorTypeController;
use App\Http\Controllers\VendorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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
    return view('auth.login');
});

Route::post('user/login', [LoginController::class, 'authenticate'])->name('user.login');

Route::middleware(['middleware' => 'auth'])->group(function () {

    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');


    Route::get('user', [UserController::class, 'index'])->name('user.data');
    Route::get('allUser', [UserController::class, 'allUser'])->name('user.allUser');

    Route::post('user', [UserController::class, 'store'])->name('user.store');
    Route::post('user/{uniqueId}', [UserController::class, 'update'])->name('user.update');

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    // return view('home');
    Route::view('/home/{path?}', 'home')->where('/home', '.*');
    Route::view('/home/{name}/{path?}', 'home')->where('/home', '.*');
    // Route::view('/home', 'home')->where('/home', '.*');

    Route::get('role', [RoleController::class, 'index'])->name('role.list');
    Route::post('role', [RoleController::class, 'store'])->name('role.store');

    Route::get('role/{uniqueId}', [RoleController::class, 'edit'])->name('role.edit');
    Route::post('role/{uniqueId}', [RoleController::class, 'update'])->name('role.update');

    Route::get('access', [PermissionAccess::class, 'access'])->name('permission.access');


    Route::get('menus', [MenuController::class, 'index'])->name('menu.index');
    Route::post('menus', [MenuController::class, 'store'])->name('menu.store');

    Route::get('getRole/{roleId}', [MenuController::class, 'getRoles']);
    

    Route::get('action', [ActionController::class, 'index'])->name('action.index');

    Route::get('ActivityMenu', [ActivityMenuController::class, 'permission'])->name('activity.paremission');
    Route::post('ActivityMenu', [ActivityMenuController::class, 'store'])->name('activity.store');

    // Get all access for a user role
    Route::get('allAccess', [MenuToRoleController::class, 'index'])->name('all.access.index');





    Route::get('allRole', [RoleController::class, 'allRole'])->name('role.all.role');

    // Get All Index
    Route::get('departments', [DepartmentController::class, 'index'])->name('department.index');
    Route::post('department', [DepartmentController::class, 'store'])->name('department.store');
    Route::post('department/{uniqueId}', [DepartmentController::class, 'update'])->name('department.update');
    Route::get('department/{search}', [DepartmentController::class, 'search'])->name('department.search');

    // Get All Index
    Route::get('categories', [CategoryController::class, 'index'])->name('category.index');
    Route::post('category', [CategoryController::class, 'store'])->name('category.store');
    Route::post('category/{uniqueId}', [CategoryController::class, 'update'])->name('category.update');
    Route::get('category/{search}', [CategoryController::class, 'search'])->name('category.search');

    // Get Brand Index
    Route::get('brand', [BrandController::class, 'index'])->name('brand.index');
    Route::post('brand', [BrandController::class, 'store'])->name('brand.store');
    Route::post('brand/{uniqueId}', [BrandController::class, 'update'])->name('brand.update');
    Route::get('brand/{search}', [BrandController::class, 'search'])->name('brand.search');

    // Get Size Index
    Route::get('size', [SizeController::class, 'index'])->name('size.index');
    Route::post('size', [SizeController::class, 'store'])->name('size.store');
    Route::post('size/{uniqueId}', [SizeController::class, 'update'])->name('size.update');
    Route::get('size/{search}', [SizeController::class, 'search'])->name('size.search');

    // Get Color Index
    Route::get('color', [ColorController::class, 'index'])->name('color.index');
    Route::post('color', [ColorController::class, 'store'])->name('color.store');
    Route::post('color/{uniqueId}', [ColorController::class, 'update'])->name('color.update');
    Route::get('color/{search}', [ColorController::class, 'search'])->name('color.search');

    // Get Color Index
    Route::get('unit', [UnitController::class, 'index'])->name('unit.index');
    Route::post('unit', [UnitController::class, 'store'])->name('unit.store');
    Route::post('unit/{uniqueId}', [UnitController::class, 'update'])->name('unit.update');
    Route::get('unit/{search}', [UnitController::class, 'search'])->name('unit.search');

    // Item Master Index
    Route::get('item_master', [ItemMasterController::class, 'index'])->name('item.index');
    Route::post('item_master', [ItemMasterController::class, 'store'])->name('item.store');
    Route::post('item_master/{uniqueId}', [ItemMasterController::class, 'update'])->name('item.update');
    Route::get('item_master/{search}', [ItemMasterController::class, 'search'])->name('item.search');

    Route::get('product/{search}', [ItemMasterController::class, 'getPost'])->name('item.search');

    //Inventory
    Route::get('inventory', [InventoryController::class, 'index'])->name('inventory.index');
    Route::post('inventory', [InventoryController::class, 'store'])->name('inventory.store');
    Route::post('inventory/{uniqueId}', [InventoryController::class, 'update'])->name('inventory.update');
    Route::get('inventory/{search}', [InventoryController::class, 'search'])->name('inventory.search');

    // Get Requisition  Index
    Route::get('requisition', [RequisitionController::class, 'index'])->name('requisition.index');
    Route::post('requisition', [RequisitionController::class, 'store'])->name('requisition.store');
    Route::post('requisition/{uniqueId}', [RequisitionController::class, 'update'])->name('requisition.update');
    Route::get('requisition/{search}', [RequisitionController::class, 'search'])->name('requisition.search');
    Route::get('requisitionList', [RequisitionController::class, 'vendorList'])->name('requisition.requisitionList');
    Route::get('item/{search}', [RequisitionController::class, 'getItem']);
    Route::get('reqvat', [RequisitionController::class, 'getVat']);


    // Get Purchase  Index
    Route::get('purchase', [PurchaseController::class, 'index'])->name('purchase.index');
    Route::post('purchase', [PurchaseController::class, 'store'])->name('purchase.store');
    Route::post('purchase/{uniqueId}', [PurchaseController::class, 'update'])->name('purchase.update');
    Route::get('purchase/{search}', [PurchaseController::class, 'search'])->name('purchase.search');
    Route::get('purchaseList', [PurchaseController::class, 'vendorList'])->name('purchase.purchaseList');
    Route::get('prequisition/{search}', [PurchaseController::class, 'requisition'])->name('prequisition.search');


    // Get Vendor  Index
    Route::get('vendor', [VendorController::class, 'index'])->name('vendor.index');
    Route::post('vendor', [VendorController::class, 'store'])->name('vendor.store');
    Route::post('vendor/{uniqueId}', [VendorController::class, 'update'])->name('vendor.update');
    Route::get('vendor/{search}', [VendorController::class, 'search'])->name('vendor.search');
    Route::get('vendorList', [VendorController::class, 'vendorList'])->name('vendor.vendorList');

    //Requisition

    // Route::get('requisition', [RequisitionCotroller::class, 'index'])->name('requisition.index');
    // Route::post('requisition', [RequisitionCotroller::class, 'store'])->name('requisition.store');
    // Route::post('requisition/{uniqueId}', [RequisitionCotroller::class, 'update'])->name('requisition.update');
    // Route::get('requisition/{search}', [RequisitionCotroller::class, 'search'])->name('requisition.search');
    // Route::get('requisitionList', [RequisitionCotroller::class, 'requisitionList'])->name('requisition.requisitionList');

    // Get Vendor Type Index
    Route::get('vendor_type', [VendorTypeController::class, 'index'])->name('vendor.type.index');
    Route::post('vendor_type', [VendorTypeController::class, 'store'])->name('vendor.type.store');
    Route::post('vendor_type/{uniqueId}', [VendorTypeController::class, 'update'])->name('vendor.type.update');
    Route::get('vendor_type/{search}', [VendorTypeController::class, 'search'])->name('vendor.type.search');

    // Get Vendor Type Index
    Route::get('customer_type', [CustomerTypeController::class, 'index'])->name('customer.type.index');
    Route::post('customer_type', [CustomerTypeController::class, 'store'])->name('customer.type.store');
    Route::post('customer_type/{uniqueId}', [CustomerTypeController::class, 'update'])->name('customer.type.update');
    Route::get('customer_type/{search}', [CustomerTypeController::class, 'search'])->name('customer.type.search');




    // Get Customer Index
    Route::get('customer', [CustomerController::class, 'index'])->name('customer.index');
    Route::post('customer', [CustomerController::class, 'store'])->name('customer.store');
    Route::post('customer/pos/window', [CustomerController::class, 'storeFromPosWindow'])->name('customer.pos.store');

    Route::post('customer/{uniqueId}', [CustomerController::class, 'update'])->name('customer.update');
    Route::get('customer/{search}', [CustomerController::class, 'search'])->name('customer.search');
    Route::get('customerList', [CustomerController::class, 'customerList'])->name('customer.customerList');


    // Get Vendor Type Index
    Route::get('vat', [VatController::class, 'index'])->name('vat.type.index');
    Route::post('vat', [VatController::class, 'store'])->name('vat.type.store');
    Route::post('vat/{uniqueId}', [VatController::class, 'update'])->name('vat.type.update');
    Route::get('vat/{search}', [VatController::class, 'search'])->name('vat.type.search');

    // Get Vendor Type Index
    Route::get('/list', [RegisterController::class, 'List'])->name('settings.register.public.index');
    Route::get('settingsRegister', [RegisterController::class, 'index'])->name('settings.register.type.index');
    Route::post('settingsRegister', [RegisterController::class, 'store'])->name('settings.register.type.store');
    Route::post('settingsRegister/{uniqueId}', [RegisterController::class, 'update'])->name('settings.register.type.update');
    Route::get('settingsRegister/{search}', [RegisterController::class, 'search'])->name('settings.register.type.search');

    // Get Register Data
    Route::get('/sell_registers', [RegisterSellController::class, 'index'])->name("sell.register.index");
    Route::get('/sell_registers/{register}', [RegisterSellController::class, 'show'])->name("sell.register.show");
    Route::post('/sell_registers', [RegisterSellController::class, 'store'])->name("sell.register.store");

    Route::post('/sales', [PosTransactionController::class, 'store'])->name("pos.sale.store");

    Route::get('/transactions', [SellTransactionController::class, 'index'])->name('sale.transaction.list');
    Route::get('/transactions/{transactionId}', [SellTransactionController::class, 'search'])->name('sale.transaction.search');


    Route::get('/open/{transactionId}', [SellTransactionController::class, 'getHold'])->name('sale.transaction.getHold');
    Route::get('/print/{transactionId}', [SellTransactionController::class, 'print'])->name('sale.transaction.print');





    // Route::post('/sales', [PosTransactionController::class, 'store'])->name("pos.sale.store");



});

Auth::routes();
