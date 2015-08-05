<?php
namespace Z7\Varnish\Controller;
use Z7\Varnish\Utility\HttpUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class VarnishController {

	/**
	 * BAN something from varnish
	 *
	 * @param string $cacheObject
	 * @return string
	 */
	public static function ban($cacheObject) {
		if ($GLOBALS['TYPO3_CONF_VARS']['SYS']['reverseProxyIP'] !== '') {
			$url = $GLOBALS['TYPO3_CONF_VARS']['SYS']['reverseProxyIP'] . ':6081';
			$siteName = 'Varnish-Ban-TYPO3-Sitename: ' . GeneralUtility::hmac($GLOBALS['TYPO3_CONF_VARS']['SYS']['sitename']);

			if (is_numeric($cacheObject)) {
				return HttpUtility::ban($url, array(
					'Varnish-Ban-TYPO3-Pid: ' . (integer) $cacheObject,
					$siteName
				));
			} elseif ($cacheObject === 'pages' || $cacheObject === 'all' || $cacheObject === 'system') {
				return HttpUtility::ban($url, array(
					'Varnish-Ban-All: 1',
					$siteName
				));
			}
		}
	}

	/**
	 * BAN by ID
	 *
	 * You can use this from other extensions…
	 * @see acm_cards\Hooks\IndexHook
	 *
	 * @param string $id
	 * @return string
	 */
	public static function banById($id) {
		if ($GLOBALS['TYPO3_CONF_VARS']['SYS']['reverseProxyIP'] !== '') {
			$url = $GLOBALS['TYPO3_CONF_VARS']['SYS']['reverseProxyIP'] . ':6081';
			$siteName = 'Varnish-Ban-TYPO3-Sitename: ' . GeneralUtility::hmac($GLOBALS['TYPO3_CONF_VARS']['SYS']['sitename']);

			return HttpUtility::ban($url, array(
				'Varnish-Ban-TYPO3-Id: ' . $id,
				$siteName
			));
		}
	}
}