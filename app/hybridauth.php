<?php
/**
 * Build a configuration array to pass to `Hybridauth\Hybridauth`
 *
 * Set the Authorization callback URL to https://path/to/hybridauth/examples/example_07/callback.php
 * Understandably, you need to replace 'path/to/hybridauth' with the real path to this script.
 */
return [
    'callback' => (isset($_ENV['SITE_URL']) ? $_ENV['SITE_URL'] : 'http://localhost:8888').'/callback.php',
    'providers' => [
        'GitHub' => [
            'enabled' => true,
            'keys' => [
                'id'     => $_ENV['GITHUB_ID'],
                'secret' => $_ENV['GITHUB_SECRET'],
            ],
            //'scope' => 'email',
        ],
        'GitLab' => [
            'enabled' => true,
            'keys' => [
                'id'     => $_ENV['GITLAB_ID'],
                'secret' => $_ENV['GITLAB_SECRET'],
            ],
            //'scope' => 'email',
        ],
    ],
];
