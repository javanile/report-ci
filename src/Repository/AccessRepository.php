<?php
declare(strict_types=1);

namespace App\Repository;

use Hybridauth\Hybridauth;

class AccessRepository
{
    /**
     *
     */
    protected $hybridauth;

    /**
     *
     */
    protected $settings;

    /**
     * @param LoggerInterface $logger
     * @param UserRepository  $userRepository
     */
    public function __construct(Hybridauth $hybridauth, $settings)
    {
        $this->hybridauth = $hybridauth;
        $this->settings = $settings;
    }

    /**
     * @return User[]
     */
    public function getCallbackUrl(): string
    {
        return $this->settings['siteUrl'].'/callback.php?provider=';
    }

    /**
     *
     */
    public function isConnected()
    {
        $adapters = $this->hybridauth->getConnectedAdapters();

        if ($adapters) {
            //echo '<h1>You are logged in:</h1>';
            foreach ($adapters as $name => $adapter) {
                if ($adapter->getUserProfile()->displayName) {
                    return true;
                }
            }
        }
    }
}
