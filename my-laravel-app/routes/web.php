<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControlGalleryController;

Route::get('/control-gallery', [ControlGalleryController::class, 'index']);