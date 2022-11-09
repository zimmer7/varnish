<?php
return [
    'varnish::banAll' => [
        'path' => '/varnish/banAll',
        'target' => Z7\Varnish\Hooks\Ajax::class . '::banAll',
        'referrer' => 'required'
    ],
];
