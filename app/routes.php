<?php
declare(strict_types=1);

use App\Action\HomeAction;
use App\Action\ExploreAction;
use App\Action\LoginAction;
use App\Action\LogoutAction;
use App\Action\SignupAction;
use App\Action\UploadAction;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {
    $app->get('/', HomeAction::class);

    $app->get('/login', LoginAction::class);
    $app->get('/signup', SignupAction::class);
    $app->get('/logout', LogoutAction::class);

    $app->get('/{space}/{group}[/{resource:.*}]', ExploreAction::class);

    $app->post('/{space}/{group}[/{resource:.*}]', UploadAction::class);
};
