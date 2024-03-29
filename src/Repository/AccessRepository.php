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

    /**
     *
     */
    public function getDefaultSpaceUrl()
    {
        $adapters = $this->hybridauth->getConnectedAdapters();

        if ($adapters) {
            foreach ($adapters as $name => $adapter) {
                return '/'.strtolower($name).parse_url($adapter->getUserProfile()->profileURL, PHP_URL_PATH);
            }
        }
    }

    /**
     *
     */
    public function getLogoutUrl()
    {
        $adapters = $this->hybridauth->getConnectedAdapters();

        if ($adapters) {
            foreach ($adapters as $name => $adapter) {
                return $this->settings['siteUrl'].'/callback.php?logout='.$name;
            }
        }
    }

    /**
     *
     */
    public function logout()
    {
        $adapters = $this->hybridauth->getConnectedAdapters();

        if ($adapters) {
            foreach ($adapters as $name => $adapter) {
                $adapter->disconnect();
            }
        }
    }

}
