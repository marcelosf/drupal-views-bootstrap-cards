<?php

namespace Drupal\views_bootstrap_cards\Plugin\views\style;

use Drupal\core\form\FormStateInterface;
use Drupal\views\Plugin\views\style\StylePluginBase;

/**
 * Views Plugin to render content into cards.
 * @ingroup views_style_plugins
 *
 * @ViewsStyle(
 *  id = "views_bootstrap_cards",
 *  title = @Translation("Bootstrap Cards"),
 *  help = @Translation("Render views contet into cards."),
 *  theme = "views_view_views_bootstrap_cards",
 *  theme_file = "../views_bootstrap_cards.theme.inc",
 *  display_types = {"normal"}
 * )
 */
class ViewsBootstrapCards extends StylePluginBase
{

  protected $usesRowPlugin = TRUE;

  /**
  * {@inheritdoc}
  */
  protected function defineOptions() {
    $options['cols'] = ['default' => 4];
    $options['image'] = ['default' => ''];
    $options['title'] = ['default' => ''];
    $options['class'] = ['default' => ''];
    $options['alt'] = ['default' => ''];
    $options['link'] = ['default' => ''];

    return $options;
  }

  /**
  * {@inheritdoc}
  */
  public function buildOptionsForm(&$form, FormStateInterface $form_state) {

    $form['cols'] = [
      '#type' => 'number',
      '#title' => t('Number Of columns'),
      '#default_value' => isset($this->options['cols']) ? $this->options['cols'] : NULL,
      '#description' => t('Number of columns.')
    ];

    $form['title'] = [
      '#type' => 'select',
      '#title' => t('Card title'),
      '#options' => $this->displayHandler->getFieldLabels(TRUE),
      '#default_value' => isset($this->options['title']) ? $this->options['title'] : NULL,
      '#description' => t('The card title')
    ];

    $form['image'] = [
      '#type' => 'select',
      '#title' => t('Image'),
      '#options' => $this->displayHandler->getFieldLabels(TRUE),
      '#default_value' => isset($this->options['image']) ? $this->options['image'] : NULL,
      '#description' => t('The card image source.')
    ];

    $form['alt'] = [
      '#type' => 'textfield',
      '#title' => t('Image alternative text'),
      '#default_value' => isset($this->options['alt']) ? $this->options['alt'] : NULL,
      '#description' => t('Image alternative text.')
    ];

    $form['link'] = [
      '#type' => 'textfield',
      '#title' => t('Link'),
      '#default_value' => isset($this->options['link']) ? $this->options['link'] : NULL,
      '#description' => t('If you want to link this card to a content provide the url content here.')
    ];

  }

}
