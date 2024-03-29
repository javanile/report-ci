<?php
declare(strict_types=1);

use DI\ContainerBuilder;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Processor\UidProcessor;
use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;
use Slim\Views\Twig;
use Hybridauth\Hybridauth;

return function (ContainerBuilder $containerBuilder) {
    $containerBuilder->addDefinitions([
        /**
         *
         */
        LoggerInterface::class => function (ContainerInterface $c) {
            $settings = $c->get('settings');

            $loggerSettings = $settings['logger'];
            $logger = new Logger($loggerSettings['name']);

            $processor = new UidProcessor();
            $logger->pushProcessor($processor);

            $handler = new StreamHandler($loggerSettings['path'], $loggerSettings['level']);
            $logger->pushHandler($handler);

            return $logger;
        },

        /**
         *
         */
        Twig::class => function (ContainerInterface $c) {
            $view = new Twig(__DIR__.'/templates', [
                //'cache' => __DIR__.'/cache',
            ]);

            return $view;
        },

        /**
         *
         */
        Hybridauth::class => function (ContainerInterface $c) {
            return new Hybridauth(include __DIR__.'/hybridauth.php');
        },
    ]);
};
