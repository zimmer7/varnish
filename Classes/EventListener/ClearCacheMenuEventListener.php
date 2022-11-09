<?php
namespace Z7\Varnish\EventListener;
use TYPO3\CMS\Backend\Backend\Event\ModifyClearCacheActionsEvent;
use TYPO3\CMS\Backend\Routing\UriBuilder;
use TYPO3\CMS\Core\Utility\GeneralUtility;

final class ClearCacheMenuEventListener {

     public function __invoke(ModifyClearCacheActionsEvent $event): void
     {
        $uriBuilder = GeneralUtility::makeInstance(UriBuilder::class);
        $event->addCacheAction([
            'id' => 'varnish',
            'title' => 'LLL:EXT:varnish/Resources/Private/Language/locallang.xlf:eventlistener.cachemenu.title',
            'description' => 'LLL:EXT:varnish/Resources/Private/Language/locallang.xlf:eventlistener.cachemenu.description',
            'href' => $uriBuilder->buildUriFromRoute('ajax_varnish::banAll'),
            'iconIdentifier' => 'actions-ext-varnish-clear'
        ]);
     }
 }
