<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SectionsController;
use App\Http\Controllers\InvoiceAchiveController;
use App\Http\Controllers\InvoicesDetailsController;
 
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
 
Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () { 
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });
 
Route::resource('invoices', InvoicesController::class);
Route::resource('sections', SectionsController::class);
Route::resource('products', ProductsController::class);

Route::get('section/{id}' , [InvoicesController::class,'getproducts']);

Route::get('InvoicesDetails/{id}' , [InvoicesDetailsController::class,'edit']);
// Route::get('view_file/{invoice_number}/{file_name}' , [InvoicesDetailsController::class,'open_file']);
// Route::get('download/{invoice_number}/{file_name}' , [InvoicesDetailsController::class,'get_file']);
// Route::get('delete_file' , [InvoicesDetailsController::class,'destroy'])->name('delete_file');

Route::get('edit_invoice/{id}' , [InvoicesController::class,'edit']);

Route::get('Status_show/{id}' , [InvoicesController::class,'show'])->name('Status_show');
Route::post('Status_Update/{id}' , [InvoicesController::class,'Status_Update'])->name('Status_Update');

Route::resource('Archive' , InvoiceAchiveController::class);
Route::get('Invoice_Paid' , [InvoicesController::class,'Invoice_Paid']);
Route::get('Invoice_UnPaid' , [InvoicesController::class,'Invoice_UnPaid']);

Route::get('Print_invoice/{id}' , [InvoicesController::class,'Print_invoice']);

require __DIR__.'/auth.php';
 