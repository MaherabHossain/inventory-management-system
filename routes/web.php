<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\userGroupController;
use App\Http\Controllers\usersController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\productController;
use App\Http\Controllers\Auth\loginController;
use App\Http\Controllers\saleInvoiceController;
use App\Http\Controllers\parchaseInvoiceController;
use App\Http\Controllers\paymentController;
use App\Http\Controllers\receiptsController;


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
Route::get('/',function(){
	return view('login.login');
});
Route::get('login',         				 [loginController::class,'login'])->name('');
Route::post('login',         				 [loginController::class,'process'])->name('login.process');

Route::group(['middleware' => 'auth'],function(){


	// HOME
	Route::get('/dashboard', function () {
	    return view('welcome');
	});

	// LOGIN


	Route::get('/logout',         				[loginController::class,'logout'])->name('logout');


	// GROUP
	Route::get('/groups',                       [userGroupController::class,'index']);
	Route::get('/groups/create',                [userGroupController::class,'create']);
	Route::post('/groups',                      [userGroupController::class,'store']);
	Route::delete('/groups/{id}',               [userGroupController::class,'delete']);

	// USER
	Route::resource('/users',            usersController::class);


	// Categories
	Route::resource('/categories',      categoryController::class, ['except' => ['show']]);


	//Product

	Route::resource('/products', 		productController::class);


	//user sale
	
    Route::get('/sale-invoice/{id}',                     		  [saleInvoiceController::class,'index'])->name('users.sale_invoice');
    Route::post('sale-invoice/{user_id}/store',          		  [saleInvoiceController::class,'storeSale'])->name('users.sale_invoice.store');
     Route::delete('sale-invoice/{user_id}/delete/{id}',  		  [saleInvoiceController::class,'delete'])->name('users.sale_invoice.delete');
     Route::get('sale-invoice/{user_id}/invoice/{invoice_id}',    [saleInvoiceController::class,'invoiceDetails'])->name('users.sale_invoice.invoice');



    //user parchase
    Route::get('/parchase-invoice/{id}',		    [parchaseInvoiceController::class,'index'])->name('users.parchase_invoice');



    ///user payment
    Route::get('/payment/{id}',					    [paymentController::class,'index'])->name('users.payment');
    Route::post('/payment-store/{user_id}',			[paymentController::class,'store'])->name('users.payment.store');
    Route::delete('/payment-delete/{user_id}/{id}', [paymentController::class,'delete'])->name('users.payments.delete');



    // users->receipts
    Route::get('/receipts/{id}', 				[receiptsController::class,'index'])->name('users.receipts');
    Route::post('/receipts/{id}', 				[receiptsController::class,'store'])->name('users.receipts.store');
    Route::delete('/receipts/{user_id}/{id}', 	[receiptsController::class,'delete'])->name('users.receipts.delete');



});



