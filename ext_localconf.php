<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

if (TYPO3_MODE === 'BE') {
	$TYPO3_CONF_VARS['SC_OPTIONS']['additionalBackendItems']['cacheActions'][] =
	   	'EXT:' . $_EXTKEY . '/Classes/Hooks/ClearCacheMenu.php:Z7\\Varnish\\Hooks\\ClearCacheMenu';
	$TYPO3_CONF_VARS['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['clearCachePostProc'][] =
	   	'EXT:' . $_EXTKEY . '/Classes/Hooks/ClearCache.php:Z7\\Varnish\\Hooks\\ClearCache->clearCache';
	$TYPO3_CONF_VARS['BE']['AJAX']['varnish::banAll'] = array(
		'callbackMethod' => 'EXT:' . $_EXTKEY . '/Classes/Hooks/Ajax.php:Z7\\Varnish\\Hooks\Ajax->banAll',
		'csrfTokenCheck' => FALSE
	);
}

if (TYPO3_MODE === 'FE') {
	$TYPO3_CONF_VARS['SC_OPTIONS']['tslib/class.tslib_fe.php']['contentPostProc-output'][] =
	   	'EXT:' . $_EXTKEY . '/Classes/Hooks/Frontend.php:Z7\\Varnish\\Hooks\\Frontend->sendHeader';
}