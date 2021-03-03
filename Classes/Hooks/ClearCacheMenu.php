<?php

namespace Z7\Varnish\Hooks;

use TYPO3\CMS\Backend\Routing\UriBuilder;
use TYPO3\CMS\Backend\Toolbar\ClearCacheActionsHookInterface;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class ClearCacheMenu implements ClearCacheActionsHookInterface
{

    /**
     * Modifies CacheMenuItems array
     *
     * @param array $cacheActions Array of CacheMenuItems
     * @param array $optionValues Array of AccessConfigurations-identifiers (typically used by userTS with options.clearCache.identifier)
     */
    public function manipulateCacheActions(&$cacheActions, &$optionValues)
    {
        if ($GLOBALS['BE_USER']->isAdmin()) {
            $uriBuilder = GeneralUtility::makeInstance(UriBuilder::class);
            $cacheActions[] = [
                'id' => 'varnish',
                'title' => 'LLL:EXT:varnish/Resources/Private/Language/locallang.xlf:hooks.cache.title',
                'description' => 'LLL:EXT:varnish/Resources/Private/Language/locallang.xlf:hooks.cache.description',
                'href' => (string)$uriBuilder->buildUriFromRoute('ajax_varnish::banAll'),
                'iconIdentifier' => 'actions-ext-varnish-clear'
            ];
            $optionValues[] = 'banAll';
        }
    }
}
