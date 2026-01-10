<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AddUserController;

Route::post('/addUser', [AddUserController::class, 'addUser']);
