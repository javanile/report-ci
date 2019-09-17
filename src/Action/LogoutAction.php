<?php
declare(strict_types=1);

namespace App\Action;

use App\Action\Action;
use App\Repository\AccessRepository;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;
use Slim\Views\Twig;

class LogoutAction extends Action
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
        AccessRepository $accessRepository
    ) {
        $this->accessRepository = $accessRepository;
    }

    /**
     * @return Response
     */
    public function action() : Response
    {
        $this->accessRepository->logout();

        return $this->redirect('/');
    }
}
