<?php

namespace Drupal\routing\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * This controller is used to pass dynamic values from parameter and also it 
 * checks if the current user or not if it is a current user then it will block
 * the request and show user access denied page.
 * 
 * @package Drupal\Core\Controller\ControllerBase
 */
class RoutingController extends ControllerBase
{

  /**
   * Build plugin is called when /routing page is hit in the browser and it 
   * checks the current user role and if it is content editor then simply it
   * shows access denied page.
   * 
   * @return array
   *   If the conditions are same then it shows welcome message.
   */
  public function build()
  {
    // Returning a simply welcome message to the user.
    return [
      '#title' => $this->t('Welcome')
    ];
  }
}
