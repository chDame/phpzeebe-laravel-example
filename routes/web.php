<?php

use Illuminate\Support\Facades\Route;

use App\Jobs\SelectAssigneeWorker;
use App\Jobs\MailWorker;

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

Route::get('workers', function () {

    dispatch(new SelectAssigneeWorker());
    dispatch(new MailWorker());

    dd('sent');
});