<?php

/**
 * @file
 * Contains \Drupal\welcome\Controller\WelcomeController.
 */

namespace Drupal\welcome\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\welcome\Messages\MessageGenerator;

/**
 * Class WelcomeController.
 *
 * @package Drupal\welcome\Controller
 */
class WelcomeController extends ControllerBase {
  private $messageGenerator;

  public function __construct(MessageGenerator $messageGenerator)
  {
    $this->messageGenerator = $messageGenerator;
  }

  /**
   * Welcome.
   *
   * @return string
   *   Return Hello string.
   */
  public function welcome($name) {
    return array(
      '#type' => 'markup',
      '#markup' => $this->t('Hello @name', array('@name' => $name))
    );
  }

  public function message() {
    $message = $this->messageGenerator->getMessage();

    return array(
      '#type' => 'markup',
      '#markup' => $message,
    );
  }

  public static function create(ContainerInterface $container)
  {
    $message = $container->get('welcome.message_generator');

    return new static($message);
  }

}