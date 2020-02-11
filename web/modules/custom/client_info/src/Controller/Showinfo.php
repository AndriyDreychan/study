<?php

namespace Drupal\client_info\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation;

/**
 * Provides route responses for the custom module.
 */
class Showinfo extends ControllerBase {

  public function client_info() {
  	$host = \Drupal::request()->getHost();
   	// $host = $_SERVER['HTTP_HOST'];
    
    $ip = \Drupal::request()->getClientIp();
    // $ip = $_SERVER['REMOTE_ADDR'];

    if (strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome') !== FALSE) {
    	$browser_name = "Chrome";
  	} elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox') !== FALSE) {
  		$browser_name = "Firefox";
  	} elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'Opera') !== FALSE) {
  		$browser_name = "Opera";
  	} elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== FALSE) {
      $browser_name = "Internet Explorer";
    }
	
    $show_content = [
      '#theme' => 'client_info',
      '#ip' => $ip,
      '#host' => $host,
      '#browser_name' => $browser_name,
    ];

    return $show_content;
  }
}
