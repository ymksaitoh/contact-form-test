<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\ModalController;
/* use App\Http\Livewire\AdminItem; */
use App\Http\Controllers\CsvDownloadController;
/* use App\Http\Controllers\CategoryController; */

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

Route::get('/', [ContactFormController::class, 'contact']);
ROute::get('/contact', [ContactFormController::class, 'contact']);
/* Route::get('/categories', [CategoryController::class, 'showCategories']); */
Route::post('/contact/confirm', [ContactFormController::class, 'confirm']);
Route::post('/contacts', [ContactFormController::class, 'store']);
Route::get('/auth/login', [ContactFormController::class, 'login'])->name('login');
Route::get('/auth/register', [ContactFormController::class, 'register'])->name('register');
Route::get('/modal', [ModalController::class, 'modal']);
Route::middleware('auth')->group(function () {
    Route::get('/admin', [ContactFormController::class, 'admin'])->name('admin.index');
});
Route::post('/admin/csv-download', [CsvDownloadController::class, 'downloadCsv'])->name('inquiries.export');
Route::delete('/inquiries/{id}', [ContactFormController::class, 'destroy'])->name('inquiries.delete');
Route::get('/thanks', [ContactFormController::class, 'thanks']);
/* Route::get('/admin', [ContactFormController::class, 'admin'])->name('admin');
 */