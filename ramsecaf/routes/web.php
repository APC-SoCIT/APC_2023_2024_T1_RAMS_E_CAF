<?php

use App\Http\Controllers\mainController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|\
*/

Route::get('/', function () {
    return view('login');
})->name('login');

Route::get('/home', [mainController::class, 'home'])->name('home');

Route::post('/userlogin', [mainController::class, 'userlogin'])->name('userlogin');

Route::get('/signout', [mainController::class, 'signout'])->name('signout');

Route::get('/kitchenexpress', [mainController::class, 'kitchenexpress'])->name('kitchenexpress');

Route::get('/addtocart/{productid}', [mainController::class, 'addtocart'])->name('addtocart');

Route::get('/proceedtocart', [mainController::class, 'proceedtocart'])->name('proceedtocart');

Route::get('/addquantity/{productid}/{cartid}', [mainController::class, 'addquantity'])->name('addquantity');

Route::get('/subtractquantity/{productid}/{cartid}', [mainController::class, 'subtractquantity'])->name('subtractquantity');

Route::get('/payment/{cartid}', [mainController::class, 'payment'])->name('payment');

Route::get('/profile', [mainController::class, 'profile'])->name('profile');

Route::get('/complete', [mainController::class, 'complete'])->name('complete');

Route::get('/order-summarry/{cartid}', [mainController::class, 'order_summary'])->name('order_summary');

Route::get('/confirm-order', [mainController::class, 'order_confirm'])->name('order_confirm');

Route::get('/confirm-orders/{cartid}', [mainController::class, 'orders_summary'])->name('orders_summary');

Route::post('/feedback', [mainController::class, 'feedback'])->name('feedback');

Route::get('/receipt/{cartid}', [mainController::class, 'receipt'])->name('receipt');

Route::get('/vendorhome', [mainController::class, 'vendorhome'])->name('vendorhome');

Route::get('/vieworders', [mainController::class, 'vieworders'])->name('vieworders');

Route::get('/editmenu', [mainController::class, 'editmenu'])->name('editmenu');

Route::get('/updatestock/{adj}/{id}', [mainController::class, 'updatestock'])->name('updatestock');

Route::get('/feedbackview/{cartid}', [mainController::class, 'feedbackview'])->name('feedbackview');

Route::get('/vendorfeedbacks', [mainController::class, 'vendorfeedbacks'])->name('vendorfeedbacks');

Route::post('/updatemenu', [mainController::class, 'updatemenu'])->name('updatemenu');

Route::get('/updatestatus/{id}', [mainController::class, 'updatestatus'])->name('updatestatus');

Route::post('/additem', [mainController::class, 'additem'])->name('additem');

Route::get('/redbrew', [mainController::class, 'redbrew'])->name('redbrew');

Route::get('/lamudras', [mainController::class, 'lamudras'])->name('lamudras');

Route::get('/afeedbackview', [mainController::class, 'afeedbackview'])->name('afeedbackview');

Route::get('/aviewreports', [mainController::class, 'aviewreports'])->name('aviewreports');

Route::get('/aeditvendor', [mainController::class, 'aeditvendor'])->name('aeditvendor');

Route::get('/vendorupdatestatus/{id}', [mainController::class, 'vendorupdatestatus'])->name('vendorupdatestatus');