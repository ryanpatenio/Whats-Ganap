<?php

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

Route::get('/home', function () {
    if (Auth::check()) {
        return view('home'); // Replace with your actual home view
    }
    return redirect('/'); // Redirect to login if not authenticated
})->name('home');


Route::get('/',function(){
    return view('auth.login');
})->name('login');

Route::get('/register',function(){
    return view('auth.register');

})->name('register');
