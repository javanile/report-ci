<?php
declare(strict_types=1);

namespace App\Action;

use App\Action\Action;
use App\Repository\AccessRepository;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;
use Slim\Views\Twig;

class ExploreAction extends Action
{
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
        #if (empty($this->args['resource'])) {
        #    return $this->redirect('/explore/github/francescobianco');
        #}

        $a = 'Hello World!!!';

        return $this->twig->render($this->response, 'explore.twig', [
            'logoutUrl' => $this->accessRepository->getLogoutUrl(),
            'title' => $a,
        ]);
    }
}
