<?php

namespace Z7\Varnish\Hooks;

use TYPO3\CMS\Core\DataHandling\DataHandler;
use Z7\Varnish\Controller\VarnishController;

class ClearCache
{

    /**
     * @param array $params
     * @param \TYPO3\CMS\Core\DataHandling\DataHandler $parent
     */
    public function clearCache(array $params, DataHandler &$parent): void
    {
        if ($params['cacheCmd'] !== null) {
            VarnishController::ban($params['cacheCmd']);
        }
    }
}
