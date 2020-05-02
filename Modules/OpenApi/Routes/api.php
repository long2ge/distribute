<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


use App\Entities\InvokerEntity;
use App\Services\InvokeService;

Route::get('/open-api/test', function () {
    $service = new InvokeService(new InvokerEntity());

    return $service->getAdminFacade()->test();
});