<?php
declare(strict_types=1);

namespace App\Action;

use App\Action\Action;
use App\Repository\AccessRepository;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Views\Twig;

class SignupAction extends Action
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
        return $this->twig->render($this->response, 'signup.twig', [
            'callbackUrl' => $this->accessRepository->getCallbackUrl(),
        ]);
    }
}
