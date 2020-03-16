<?php

namespace Drupal\tiktok_field\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Field\FieldItemListInterface;

/**
 * {@inheritdoc}
 *
 * @FieldFormatter(
 *   id = "tiktok_field_text_formatter",
 *   label = @Translation("TikTok Simple text"),
 *   field_types = {
 *     "tiktok_field"
 *   }
 * )
 */
class TiktokFieldTextFormatter extends FormatterBase {

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $element = [];

    foreach ($items as $delta => $item) {

      // Show our elemnts.
      $element[$delta] = [
        '#type' => 'markup',
        '#markup' => $item->value,
      ];
    }

    return $element;
  }

}
