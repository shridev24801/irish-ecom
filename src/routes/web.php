<?php

use Irish\Ecom\Controllers\EcomContoller;
use Illuminate\Support\Facades\Route;

Route::get('shri', [EcomContoller::class,'firstOne']);