<?php

use App\Http\Controllers\Api\V1\GroupController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('/v1')->group(function () {
   Route::prefix('/group')->group(function () {
       Route::post('/', [GroupController::class, 'createGroup']);
   });
});

