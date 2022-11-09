<?php

namespace Z7\Varnish\Hooks;

use Psr\Http\Message\ServerRequestInterface;
use TYPO3\CMS\Core\Http\JsonResponse;
use TYPO3\CMS\Extbase\Utility\LocalizationUtility;
use Z7\Varnish\Controller\VarnishController;

class Ajax
{

    /**
     * @param ServerRequestInterface $request
     * @return JsonResponse
     */
    public function banAll(ServerRequestInterface $request): JsonResponse
    {
        $logger = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\CMS\Core\Log\LogManager')->getLogger(__CLASS__);
        $logger->info('User ' . $GLOBALS['BE_USER']->user['username'] . ' has cleared the varnish cache');
        VarnishController::ban('banAll');
        return new JsonResponse([
            'success' => true,
            'title' => LocalizationUtility::translate('LLL:EXT:varnish/Resources/Private/Language/locallang.xlf:ajax.success.title'),
            'message' => LocalizationUtility::translate('LLL:EXT:varnish/Resources/Private/Language/locallang.xlf:ajax.success.message'),
        ]);
    }
}
