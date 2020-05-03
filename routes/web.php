<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

//$router->get('/', function () use ($router) {
//    return $router->app->version();
//})->middleware('cors');

use App\Repositories\UserRepository;
use App\Services\AuthorizationManageServer;
use Psr\Http\Message\ServerRequestInterface;

$router->group(['middleware' => 'cors'], function () use ($router) {
    $router->get('/', function () use ($router) {
        return $router->app->version();
    });

    $router->get('/login/test', function (ServerRequestInterface $request) {
        $UserRepository = new UserRepository();
        $AuthorizationManageServer = new AuthorizationManageServer($UserRepository);
        return $AuthorizationManageServer->login($request, 1111, '');
    });
});


