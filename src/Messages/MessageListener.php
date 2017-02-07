<?php

namespace Drupal\welcome\Messages;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class MessageListener implements EventSubscriberInterface
{
  public function onKernelRequest(GetResponseEvent $event) {
    ksm($event);
  }

  public static function getSubscribedEvents()
  {
    return array (
      KernelEvents::REQUEST => 'onKernelRequest',
    );
  }

}