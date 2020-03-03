<?php

namespace Drupal\client_info\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\Request;

/**
 * Provides route responses for the custom module.
 */
class ShowInfoController extends ControllerBase {

  /**
   * Provide functionality that show client info.
   *
   * @param \Symfony\Component\HttpFoundation\Request $request
   *   Request for getting browser for user.
   *
   * @return array
   *   Array with all client information.
   * @dataProvider dataProvider
   * @covers ::transform
   */
  public function getClientInfo(Request $request) {

    $host = $request->getHost();
    // Another methods to get client host.
    // $host = \Drupal::request()->getHost();
    // $host = $_SERVER['HTTP_HOST'];.
    $ip = \Drupal::request()->getClientIp();
    // Another methods to get client ip.
    // $ip = $_SERVER['REMOTE_ADDR'];.
    // Request via controller.
    $controller_request_browser = $request->headers->get('User-Agent', '');

    // Another methods to get client browser.
    if (strpos($controller_request_browser, 'Chrome') !== FALSE) {
      $browser_name = "Chrome";
    }
    elseif (strpos($controller_request_browser, 'Firefox') !== FALSE) {
      $browser_name = "Firefox";
    }
    elseif (strpos($controller_request_browser, 'Opera') !== FALSE) {
      $browser_name = "Opera";
    }
    elseif (strpos($controller_request_browser, 'MSIE') !== FALSE) {
      $browser_name = "Internet Explorer";
    }
    else {
      $browser_name = "You use another browser!";
    }

    $show_content = [
      '#theme' => 'client_info',
      '#ip' => $ip,
      '#host' => $host,
      '#browser_name' => $browser_name,
      '#controller_request_browser' => $controller_request_browser,
    ];

    return $show_content;
  }

}
