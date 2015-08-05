<?php
namespace Z7\Varnish\Hooks;
use Z7\Varnish\Controller\VarnishController;

class ClearCache {

	/**
	 * Clear Cache Hook
	 *
	 * @param array $params
	 * @param \TYPO3\CMS\Core\DataHandling\DataHandler $parent
	 * @return void
	 */
	public function clearCache($params, \TYPO3\CMS\Core\DataHandling\DataHandler &$parent) {
		if ($params['cacheCmd'] !== NULL) {
			VarnishController::ban($params['cacheCmd']);
		}
	}
}