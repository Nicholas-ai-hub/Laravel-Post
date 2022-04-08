<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users; 
use App\Http\Controllers\UsersController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController; //აუცილებლად უნდა შემოვიტანოთ,დავაიმპორტოთ კლასი
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\PostController;



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



//Route::get('users/{a}', [Users::class, 'index']);/* ორივეს თუ ვუწერთ users უპირატესობას
//ანიჭებს ამას(პირველს), რატომ? */ 
// Route::get('/user/{name}', function($name)
// {
//      return view('users', ['us' => $name]);
// });

//Route::get('user/{name}', [UsersController::class, 'loadView']);

//Route::view('user', 'users'); - ამ სინტაქსზე გვაქვს ლიმიტი

Route::get('/', function() {
    return view('home');
})->name('home');

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
/*name
სახელს ვარქმევთ როუტს. მოსახერხებელია, რადგან თუ შევცვლით დაშბორდის მდებარეობას, მაინც იმუშავებს*/

Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::post('/posts', [PostController::class, 'store']);
