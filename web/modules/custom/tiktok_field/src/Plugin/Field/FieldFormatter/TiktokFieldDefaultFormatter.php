<?php

namespace Drupal\tiktok_field\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Field\FieldItemListInterface;

/**
 * {@inheritdoc}
 *
 * @FieldFormatter(
 *   id = "tiktok_field_default_formatter",
 *   label = @Translation("TikTok Oembed"),
 *   field_types = {
 *     "tiktok_field"
 *   }
 * )
 */
class TiktokFieldDefaultFormatter extends FormatterBase {

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $element = [];

    foreach ($items as $delta => $item) {

      $baseUrl = 'https://www.tiktok.com/oembed?url=';
      $videoId = $item->value;

      $url = $baseUrl . $videoId;
      $json = json_decode(file_get_contents($url), TRUE);

      // Shows our elements.
      $element[$delta] = [
        '#type' => 'markup',
        '#markup' => $json['html'],
      ];
    }

    return $element;
  }

}
