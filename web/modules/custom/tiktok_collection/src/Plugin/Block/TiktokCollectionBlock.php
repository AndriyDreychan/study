<?php

namespace Drupal\tiktok_collection\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;
use function Twig\Tests\html;


/**
 * Defines a tiktok block type.
 *
 * @Block(
 *   id = "tiktok_collection_block",
 *   admin_label = @Translation("Tiktok Collection"),
 *   category = @Translation("Tiktok"),
 * )
 */
class TiktokCollectionBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $config = $this->getConfiguration();
    $form['tiktok_collection'] = [
      '#type' => 'fieldset',
      '#title' => t('Settings'),
    ];
    $form['tiktok_collection']['tiktok_id'] = [
      '#type' => 'textfield',
      '#title' => t('Tiktok video ID'),
      '#description' => t('Video ID is leters after https://www.tiktok.com/oembed?url= (full url)'),
      '#size' => 60,
      '#default_value' => $config['tiktok_id'],
      '#required' => TRUE,
    ];
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    foreach (['tiktok_collection'] as $fieldset) {
      $fieldset_values = $form_state->getValue($fieldset);
      foreach ($fieldset_values as $key => $value) {
        $this->setConfigurationValue($key, $value);
      }
    }
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    $config = $this->getConfiguration();

    $baseUrl = 'https://www.tiktok.com/oembed?url=';
    $videolId = $config['tiktok_id'];

    $url = $baseUrl . $videolId;

    $json = json_decode(file_get_contents($url), true);

//    kint($videolId);
//    kint($url);
//    kint($json);
//    die();

    $build[] = [
      '#theme' => 'tiktok_collection',
      '#rows' => $json,
    ];

    $build['#attached']['library'][] = 'tiktok_collection/tiktok_collection';

    return $build;
  }

  /**
   * {@inheritdoc}
   */
  public function getCacheMaxAge() {
    return 0;
  }
}
