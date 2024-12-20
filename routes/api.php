<?php

use App\Http\Controllers\Api\V1\GroupController;
use App\Http\Controllers\Api\V1\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('/v1')->group(function () {
   Route::prefix('/group')->group(function () {
       Route::post('/', [GroupController::class, 'createGroup'])->name('api.group.create');
       Route::post('/addUser', [GroupController::class, 'addUser'])->name('api.group.addUser');
   });

   Route::prefix('/user')->group(function () {
       Route::post('/', [UserController::class, 'createUser'])->name('api.user.create');
       Route::get('/{user}/match', [UserController::class, 'getMatch'])->name('api.user.get.match');


   });


});

