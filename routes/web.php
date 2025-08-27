<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImportController;

Route::get('/', function () {
    return view('index');
});

Route::get('/Import',[ImportController::class,'index']);

Route::get('/Export',[ExportController::class,'index']);

Route::get('/Statistics',[StatisticsController::class,'index']);