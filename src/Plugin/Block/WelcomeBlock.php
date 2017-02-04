<?php

namespace Drupal\welcome\Plugin\Block;
use Drupal\Core\Block\BlockBase;

class WelcomeBlock extends BlockBase {
  /**
   * Provides a 'Welcome' Block
   *
   * @Block(
   *   id = "welcome_block",
   *   admin_label = @Translation("Welcome block"),
   * )
   */
  public function build() {
    $name = \Drupal::currentUser()->getDisplayName();
    return array(
      '#markup' => $this->t('Hello @name, thank you for logging in and welcome!', array('@name' => $name)),
    );
  }
}