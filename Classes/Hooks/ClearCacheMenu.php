<?php
namespace Z7\Varnish\Hooks;
use TYPO3\CMS\Extbase\Utility\LocalizationUtility;
use TYPO3\CMS\Backend\Utility\BackendUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Imaging\Icon;
use TYPO3\CMS\Core\Imaging\IconFactory;

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
            $iconFactory = GeneralUtility::makeInstance(IconFactory::class);
            $cacheActions[] = [
                'id' => 'varnish',
                'title' => LocalizationUtility::translate('LLL:EXT:varnish/Resources/Private/Language/locallang.xlf:hooks.cache.title', $_EXTKEY),
                'description' => LocalizationUtility::translate('LLL:EXT:varnish/Resources/Private/Language/locallang.xlf:hooks.cache.description', $_EXTKEY),
                'href' => BackendUtility::getAjaxUrl('varnish::banAll'),
                'icon' => $iconFactory->getIcon('actions-ext-varnish-clear', Icon::SIZE_SMALL)->render()
            ];
            $optionValues[] = 'banAll';
        }
    }
}
