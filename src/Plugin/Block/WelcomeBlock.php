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
    $token = \Drupal::token();
    $message = $token->replace($this->configuration['welcome_message'], array('user' => \Drupal::currentUser()));

    return array(
      '#markup' => $this->t($message),
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