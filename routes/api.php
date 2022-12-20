<?php

use App\Http\Controllers\AdController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


///// Category Routes
Route::post('category/add', [CategoryController::class, 'insert']);
Route::get('category/show', [CategoryController::class, 'index']);
Route::put('category/update/{id}', [CategoryController::class, 'update']);
Route::delete('category/delete/{id}', [CategoryController::class, 'destroy']);


////// Tag Routes
Route::post('tag/add', [TagController::class, 'insert']);
Route::get('tag/show', [TagController::class, 'index']);
Route::put('tag/update/{id}', [TagController::class, 'update']);
Route::delete('tag/delete/{id}', [TagController::class, 'destroy']);


/////  Advertisment filter by category
Route::get('ad-by-category/{id}', [AdController::class, 'bycategory']);

/////  Advertisment filter by tag
Route::get('ad-by-tag/{id}', [AdController::class, 'bytag']);

/////  Advertiser Owned ads
Route::get('advertiser/show-ads/{id}', [AdController::class, 'advertiserads']);

/////  Manual Mail sender
Route::get('mail/send', [AdController::class, 'mail']);
