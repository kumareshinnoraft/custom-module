<?php

namespace Drupal\services\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Returns responses for services routes.
 */
class ServicesController extends ControllerBase {

  /**
   * Builds the response.
   */
  public function build() {

    \Drupal::moduleHandler()->invokeAll('custom_hook_my_custom_hook', ['item1', 'item2']);

    // This is a new kind of array.
    $build['content'] = [
      '#type' => 'item', 
      '#title'  => "Replacing title with something else",
      '#markup' => $this->t('It works!'),
    ];

    // This array is going to replace the title.
    $build = [
      '#title' => "Nothing but working"
    ];

    return $build;
  }

}
