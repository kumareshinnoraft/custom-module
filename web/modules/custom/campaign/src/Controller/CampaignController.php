<?php

namespace Drupal\campaign\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Routing\TrustedRedirectResponse;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

/**
 * Used to create dynamic value from the 
 */
class CampaignController extends ControllerBase {

  /**
   * There are different redirect approaches and some the bellow.
   * Alternative approaches are bellow.
   *  
   * $this->redirect('<front>');
   * $this->redirect('hello_user.greet_user');
   * return new TrustedRedirectResponse('https://google.com');
   * 
   * @return mixed
   *   AccessDeniedHttpException is core routing class for access denied and 
   *   other return type is array which simply returns title.
   */
  public function validateUser() {

    // Getting the current user.
    $currentUser = \Drupal::currentUser();

    // Find the roles from the array.
    if (in_array('content_editor', $currentUser->getRoles())) {
      // By throwing the exception.
      throw new AccessDeniedHttpException('The content editor user is not allowed.');
    }

    // Returning a simply welcome message to the user. 
    return [
      '#title' => $this->t('Welcome ' . $currentUser->getAccountName())
    ];
  }

  /**
   * This function is used for the dynamic value from the URL.
   * 
   * @param mixed $num
   *   This value would appear from the URL.
   * 
   * @return array
   *   Returns array with global value translate variable.
   */
  public function parameter(mixed $num)
  {
    return [
      '#title' => $this->t('Welcome ' . $num)
    ];
  }
}
