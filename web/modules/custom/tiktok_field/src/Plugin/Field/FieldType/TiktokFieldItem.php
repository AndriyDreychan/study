<?php

namespace Drupal\tiktok_field\Plugin\Field\FieldType;

use Drupal\Core\Field\FieldItemBase;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\TypedData\DataDefinition;

/**
 * {@inheritdoc}
 *
 * @FieldType( Small description.
 *   id = "tiktok_field",
 *   label = @Translation("TikTok field"),
 *   module = "tiktok_field",
 *   description = @Translation("Allow you to insert VIDEO from TikTok to drupal"),
 *   category = @Translation("TikTok"),
 *   default_widget = "tiktok_field_html5_input_widget",
 *   default_formatter = "tiktok_field_default_formatter"
 * )
 */
class TiktokFieldItem extends FieldItemBase {

  /**
   * {@inheritdoc}
   *
   * @see https://www.drupal.org/node/159605
   */
  public static function schema(FieldStorageDefinitionInterface $field_definition) {
    return [
      'columns' => [
        'value' => [
          'type' => 'text',
          'not null' => FALSE,
        ],
      ],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public static function propertyDefinitions(FieldStorageDefinitionInterface $field_definition) {
    $properties['value'] = DataDefinition::create('string')
      ->setLabel(t('TikTok URL'));

    return $properties;
  }

}
