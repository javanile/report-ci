<?php
declare(strict_types=1);

namespace App\Action;

use App\Action\Action;
use App\Repository\AccessRepository;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;
use Slim\Views\Twig;

class LoginAction extends Action
{
    /**
     *
     */
    protected $accessRepository;

    /**
     * @param LoggerInterface $logger
     * @param UserRepository  $userRepository
     */
    public function __construct(
        Twig $twig,
        AccessRepository $accessRepository
    ) {
        $this->twig = $twig;
        $this->accessRepository = $accessRepository;
    }

    /**
     * @return Response
     */
    public function action() : Response
    {
        if ($this->accessRepository->isConnected()) {
            return $this->redirect($this->accessRepository->getDefaultSpaceUrl());
        }

        return $this->twig->render($this->response, 'login.twig', [
            'callbackUrl' => $this->accessRepository->getCallbackUrl(),
        ]);
    }
}
