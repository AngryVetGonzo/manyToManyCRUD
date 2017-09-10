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

    $role = new Role(['name' => 'Author']);

    $user->roles()->save($role);
});


Route::get('/read', function () {
    
    $user = User::find(1);

    foreach ($user->roles as $role) {
        echo ($role)->content;
    }
    
});

Route::get('/update', function () {
    $user = User::findOrFail(1);

    if($user->has('roles')) {
        foreach ($user->roles as $role) {
            if($role->name == 'Admin') {
                $role->name = "subscriber";
                $role->save();
            }
        }
    }
});


Route::get('/delete', function () {
    $user = User::findOrFail(1);

    foreach($user->roles as $role) {

        $role->whereId(1)->delete();

    }
});


Route::get('/attach', function () {

    $user = User::findOrFail(1);

    $user->roles()->attach(2);

});


Route::get('/detach', function () {

    $user = User::findOrFail(1);

    $user->roles()->detach();

});


Route::get('/sync', function () {

    $user = User::findOrFail(1);

    $user->roles()->sync([4,5]);

});














