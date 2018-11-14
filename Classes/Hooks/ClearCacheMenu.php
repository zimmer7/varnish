<?php
namespace Z7\Varnish\Hooks;
use TYPO3\CMS\Backend\Utility\BackendUtility;

class ClearCacheMenu implements \TYPO3\CMS\Backend\Toolbar\ClearCacheActionsHookInterface
{

    /**
     * Modifies CacheMenuItems array
     *
     * @param array $cacheActions Array of CacheMenuItems
     * @param array $optionValues Array of AccessConfigurations-identifiers (typically used by userTS with options.clearCache.identifier)
     * @return void
     */
    public function manipulateCacheActions(&$cacheActions, &$optionValues)
    {
        if ($GLOBALS['BE_USER']->isAdmin()) {
            $cacheActions[] = [
                'id' => 'varnish',
                'title' => 'LLL:EXT:varnish/Resources/Private/Language/locallang.xlf:hooks.cache.title',
                'description' => 'LLL:EXT:varnish/Resources/Private/Language/locallang.xlf:hooks.cache.description',
                'href' => BackendUtility::getAjaxUrl('varnish::banAll'),
                'iconIdentifier' => 'actions-ext-varnish-clear'
            ];
            $optionValues[] = 'banAll';
        }
    }
}
