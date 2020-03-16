<?php

namespace Drupal\tiktok_field\Plugin\Field\FieldWidget;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * {@inheritdoc}
 *
 * @FieldWidget(
 *   id = "tiktok_field_html5_input_widget",
 *   module = "tiktok_field",
 *   label = @Translation("HTML5 Color Picker"),
 *   field_types = {
 *     "tiktok_field"
 *   }
 * )
 */
class TiktokFieldHTML5InputWidget extends WidgetBase {

  /**
   * {@inheritdoc}
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {
    $element += [
      '#type' => 'textfield',
      '#default_value' => isset($items[$delta]->value) ? $items[$delta]->value : '',
      '#size' => 150,
      '#maxlength' => 150,
    ];

    return ['value' => $element];
  }

}
