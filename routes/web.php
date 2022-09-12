<?php

use App\Models\Distribution;
use App\Models\Farmer;
use App\Models\FarmInput;
use App\Models\User;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $stats = [
        'no_of_farmers' => Farmer::all()->count(),
        'no_of_farm_inputs' => FarmInput::all()->count(),
        'no_of_available_farm_inputs' => FarmInput::where('status', 'LIKE', 'av')->get()->count(),
        'no_of_out_of_stock_farm_inputs' => FarmInput::where('status', 'LIKE', 'un')->get()->count(),
        'no_of_distributions' => Distribution::all()->count(),
        'no_of_users' => User::all()->count()
    ];

    return view('dashboard', ['stats' => $stats]);

})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
Route::resource('distributions','App\Http\Controllers\DistributionController');

Route::resource('farmers','App\Http\Controllers\FarmerController');

Route::resource('farminputs','App\Http\Controllers\FarmInputController');

