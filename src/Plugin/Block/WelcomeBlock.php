<?php

namespace Drupal\welcome\Plugin\Block;
use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'Welcome' Block
 *
 * @Block(
 *   id = "welcome_block",
 *   admin_label = @Translation("Welcome block"),
 * )
 */
class WelcomeBlock extends BlockBase {
  /**
   * {@inheritdoc}
   */
  public function build() {
    $name = \Drupal::currentUser()->getDisplayName();
    return array(
      '#markup' => $this->t('@welcome_message', array('@welcome_message' => $this->configuration['welcome_message'])),
    );
  }

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    return array(
      'welcome_message' => 'Hello world',
    );
  }

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, \Drupal\Core\Form\FormStateInterface $form_state) {
    $form['welcome_message'] = array(
      '#type' => 'textarea',
      '#title' => t('Welcome message'),
      '#default_value' => $this->configuration['welcome_message'],
    );

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, \Drupal\Core\Form\FormStateInterface $form_state) {
    $this->configuration['welcome_message'] = $form_state->getValue('welcome_message');
  }
}