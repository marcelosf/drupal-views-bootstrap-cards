<?php

/**
* @file
* Theme for Views Bootstrap Cards.
*/

use Drupal\views_bootstrap_cards\ViewsBootstrapCards;

function template_preprocess_views_view_views_bootstrap_cards(&$variables) {

  global $base_url;

  $options = $variables['view']->style_plugin->options;
  $stylePlugin = $variables['view']->style_plugin;
  $columnSize = $options['cols'];

  $options['class'] = ViewsBootstrapCards::getClasses($columnSize);

  $options['cards'] = [];

  foreach ($variables['rows'] as $id => $row) {
    $cardLinkUrl = $base_url . '/node/' . $row['#row']->nid;
    $cardLinkField = $stylePlugin->getField($id, $options['link']);
    $cardLink = isset($cardLinkField) ? $cardLinkField : $cardLinkUrl;

    $options['cards'][$id]['card_link'] = $cardLink;
    $options['cards'][$id]['image'] = $stylePlugin->getField($id, $options['image']);
    $options['cards'][$id]['title'] = $stylePlugin->getField($id, $options['title']);
    $options['cards'][$id]['alt'] = $stylePlugin->getField($id, $options['alt']);
  }

  $variables['options'] = $options;

  $optionsCards = ViewsBootstrapCards::divideColumnsAmountIntoRows($options['cards'], $columnSize);
  $variables['options']['cards'] = $optionsCards;

}
