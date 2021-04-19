<?php

namespace Kcs\FlocDisabler\Symfony;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ResponseEvent;

class Listener implements EventSubscriberInterface
{
    public function onRequest(ResponseEvent $event)
    {
        $response = $event->getResponse();
        Disabler::disable($response);
    }

    public static function getSubscribedEvents()
    {
        return array(
            'kernel.response' => array('onResponse', -256)
        );
    }
}
