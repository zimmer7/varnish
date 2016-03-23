<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

if (TYPO3_MODE === 'BE') {
	$TYPO3_CONF_VARS['SC_OPTIONS']['additionalBackendItems']['cacheActions']['banAll'] =
		'Z7\\Varnish\\Hooks\\ClearCacheMenu';
	$TYPO3_CONF_VARS['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['clearCachePostProc'][] =
		'Z7\\Varnish\\Hooks\\ClearCache->clearCache';
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::registerAjaxHandler(
        'varnish::banAll',
		'Z7\\Varnish\\Hooks\Ajax->banAll'
    );
}

if (TYPO3_MODE === 'FE') {
	$TYPO3_CONF_VARS['SC_OPTIONS']['tslib/class.tslib_fe.php']['contentPostProc-output'][] =
		'Z7\\Varnish\\Hooks\\Frontend->sendHeader';
}