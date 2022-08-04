<?php

use App\Http\Controllers\Frontend\FrontendController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [FrontendController::class, 'index']);
Route::get('/certificate/{slug}', [FrontendController::class, 'certificate'])->name('certificate.view');
Route::get('/certificate/{certificate:slug}/download', [FrontendController::class, 'download'])->name('certificate.download');

include('admin.php');
include('user.php');
