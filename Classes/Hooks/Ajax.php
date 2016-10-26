<?php
namespace Z7\Varnish\Hooks;
use Z7\Varnish\Controller\VarnishController;

class Ajax {
	public function banAll() {
		$logger = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\CMS\Core\Log\LogManager')->getLogger(__CLASS__);
		$logger->info('User ' . $GLOBALS['BE_USER']->user['username'] . ' has cleared the varnish cache');
		VarnishController::ban('banAll');
	}
}