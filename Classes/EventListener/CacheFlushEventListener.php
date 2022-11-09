<?php
namespace Z7\Varnish\EventListener;
use TYPO3\CMS\Core\Cache\Event\CacheFlushEvent;
use Z7\Varnish\Controller\VarnishController;

final class CacheFlushEventListener {

     public function __invoke(CacheFlushEvent $event): void
     {
        $groups = $event->getGroups();
        if (in_array('all', $groups)) {
            VarnishController::ban('all');
        } else if (in_array('pages', $groups)) {
            VarnishController::ban('pages');
        }
     }
 }
