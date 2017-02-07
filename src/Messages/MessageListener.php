<?php

namespace Drupal\welcome\Messages;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class MessageListener implements EventSubscriberInterface
{
  public function onKernelRequest(GetResponseEvent $event) {
    $request = $event->getRequest();
    $message = $request->query->get('message');

    if ($message) {
      drupal_set_message('there is a message');
    }
  }

  public static function getSubscribedEvents()
  {
    return array (
      KernelEvents::REQUEST => 'onKernelRequest',
    );
  }

}