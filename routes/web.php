<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    $titre = 'TP  Back-END';
    $soustitre = 'LARAVEL';
    $description = 'Laravel has wonderful, thorough documentation covering every aspect of the framework. Whether you are new to the framework or have previous experience with Laravel, we recommend reading all of the documentation from beginning to end.';

    return view('home', compact('titre', 'soustitre', 'description'));
});

Route::get('/contact', function () {
    return view('contact');
});

Route::post('/contact', function () {
    $data = request()->validate([
        'nom' => 'required',
        'email' => 'required|email',
        'message' => 'required'
    ]);

    return redirect('/thankyou')->with('message', 'Merci pour vous ! Votre information a été enregistrée .')->withInput();
});
Route::get('/thankyou', function () {
    $message = session('message');
    $data = [
        'nom' => old('nom'),
        'email' => old('email'),
        'message' => old('message')
    ];
    return view('thankyou', compact('message', 'data'));
});