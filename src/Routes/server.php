<?php

/**
 * Routes which is neccessary for the SSO server.
 */

use Illuminate\Support\Facades\Route;

Route::middleware(config('laravel-sso.routeGroupMiddleware'))
    ->prefix(trim(config('laravel-sso.routePrefix'), ' /'))
    ->group(function () {
        Route::post('login', [Nddcoder\LaravelSSO\Controllers\ServerController::class,'login']);
        Route::post('logout', [Nddcoder\LaravelSSO\Controllers\ServerController::class, 'logout']);
        Route::middleware(config('laravel-sso.routeAttachMiddleware'))
            ->get('attach', [Nddcoder\LaravelSSO\Controllers\ServerController::class, 'attach']);
        Route::middleware(config('laravel-sso.routeAttachMiddleware'))
            ->post('attach', [Nddcoder\LaravelSSO\Controllers\ServerController::class, 'attach']);
        Route::get('userInfo', [Nddcoder\LaravelSSO\Controllers\ServerController::class, 'userInfo']);
    });
