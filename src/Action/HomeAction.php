<?php
declare(strict_types=1);

namespace App\Action;

use App\Action\Action;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;
use Slim\Views\Twig;

class HomeAction extends Action
{
    /**
     * @param LoggerInterface $logger
     * @param UserRepository  $userRepository
     */
    public function __construct(
        Twig $twig,
        ContainerInterface $container
    ) {
        $this->twig = $twig;
        $this->siteUrl = $container->get('settings')['siteUrl'];
    }

    /**
     * @return Response
     */
    public function action() : Response
    {
        return $this->twig->render($this->response, 'home.twig', [
            'title' => ' ',
        ]);
    }
}
