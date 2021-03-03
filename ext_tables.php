<?php

defined('TYPO3_MODE') or die();

$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
$iconRegistry->registerIcon('actions-ext-varnish-clear', \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class, [
    'source' => 'EXT:varnish/Resources/Public/Icons/ClearVarnish.svg'
]);
