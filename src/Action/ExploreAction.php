<?php
declare(strict_types=1);

namespace App\Action;

use App\Action\Action;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;
use Slim\Views\Twig;

class ExploreAction extends Action
{
    /**
     * @param LoggerInterface $logger
     * @param UserRepository  $userRepository
     */
    public function __construct(Twig $twig, LoggerInterface $logger)
    {
        $this->twig = $twig;
    }

    /**
     * @return Response
     */
    public function action() : Response
    {
        $a = 'Hello World!!!';

        return $this->twig->render($this->response, 'explore.twig', [
            'title' => $a,
        ]);
    }
}
