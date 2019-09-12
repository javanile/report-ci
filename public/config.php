<?php
/**
 * Build a configuration array to pass to `Hybridauth\Hybridauth`
 *
 * Set the Authorization callback URL to https://path/to/hybridauth/examples/example_07/callback.php
 * Understandably, you need to replace 'path/to/hybridauth' with the real path to this script.
 */
$config = [
    'callback' => 'https://path/to/hybridauth/examples/example_07/callback.php',
    'providers' => [
        'GitHub' => [
            'enabled' => true,
            'keys' => [
                'id'     => 'Iv1.c843601e51a45e6a',
                'secret' => '2b1a27162d04e063990ba31840d78400012d2b9e',
            ],
            //'scope' => 'email',
        ],
        'GitLab' => [
            'enabled' => true,
            'keys' => [
                'id'     => 'd704d3d015bf66617386eb9dcaa44d1b5f8fcaf395e8ea3bc7b829ad1b75ddc6',
                'secret' => 'bdb76cbb33e8d605510c41bf64bf46c29799297b0ec0b6691f2b45b67b9b1862',
            ],
            //'scope' => 'email',
        ],
    ],
];
