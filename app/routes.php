<?php
declare(strict_types=1);

use App\Action\HomeAction;
use App\Action\ExploreAction;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {
    $app->get('/', HomeAction::class);

    $app->get('/explore', ExploreAction::class);
};
