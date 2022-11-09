<?php
namespace Z7\Varnish\Middleware;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

use TYPO3\CMS\Core\Utility\GeneralUtility;

class Frontend implements MiddlewareInterface
{

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $response = $handler->handle($request);
        $requestNormalizedParams = $request->getAttribute('normalizedParams');

        // add the TYPO3-Pid header
        $response = $response->withHeader(
            'TYPO3-Pid', (string)$request->getAttribute('routing')['pageId']
        )->withHeader(
            'TYPO3-Sitename', GeneralUtility::hmac($GLOBALS['TYPO3_CONF_VARS']['SYS']['sitename'])
        );

        return $response;
    }
}
