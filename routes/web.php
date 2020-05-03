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

use App\Repositories\UserRepository;
use App\Services\AuthorizationManageServer;
use Psr\Http\Message\ServerRequestInterface;

$router->group(['middleware' => 'cors'], function () use ($router) {
    $router->get('/', function () use ($router) {
        return $router->app->version();
    });

    $router->get('/login/test', function (ServerRequestInterface $request) {
        $AuthorizationManageServer = new AuthorizationManageServer(new UserRepository());

        return $AuthorizationManageServer->login(
            $request, UserRepository::DEMO_NAME, UserRepository::DEMO_PASSWORD);
    });
});


