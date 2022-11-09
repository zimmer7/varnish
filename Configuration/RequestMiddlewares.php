<?php
use Z7\Varnish\Middleware\Frontend;

return [
    'frontend' => [
        Frontend::class => [
            'target' => Frontend::class,
            'after' => [ 'typo3/cms-frontend/page-resolver' ],
        ],
    ],
];
