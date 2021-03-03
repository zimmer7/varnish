<?php

defined('TYPO3_MODE') or die();

switch (TYPO3_MODE) {
case 'BE':
    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['additionalBackendItems']['cacheActions']['banAll'] = Z7\Varnish\Hooks\ClearCacheMenu::class;
    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['clearCachePostProc'][] = Z7\Varnish\Hooks\ClearCache::class . '->clearCache';
    break;
case 'FE':
    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['tslib/class.tslib_fe.php']['contentPostProc-output'][] = Z7\Varnish\Hooks\Frontend::class . '->sendHeader';
    break;
}
