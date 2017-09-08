<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\Role;
use App\User;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/create', function () {

    $user = User::find(1);

    $role = new Role(['name' => 'Admin']);

    $user->roles()->save($role);
});