<?php

namespace Drupal\welcome\Messages;


class MessageGenerator
{
  private $params;

  public function __construct($params)
  {
    $this->params = $params;
  }

  public function getMessage() {
    $params = $this->params;
    $message_key = array_rand($params);
    $message = $params[$message_key];

    return $message;
  }
}