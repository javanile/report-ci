<?php
declare(strict_types=1);

use App\Repository\AccessRepository;
use DI\ContainerBuilder;
use Psr\Container\ContainerInterface;
use Hybridauth\Hybridauth;

return function (ContainerBuilder $containerBuilder) {
    $containerBuilder->addDefinitions([
        AccessRepository::class => function (ContainerInterface $c) {
            return new AccessRepository($c->get(Hybridauth::class), $c->get('settings'));
        },
    ]);
};
