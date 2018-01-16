<?php

namespace Drupal\views_bootstrap_cards;

class ViewsBootstrapCards {

  public static function getClasses($numberOfColumns)  {
    $width = (int)(12/$numberOfColumns);
    return 'col-xs-12 col-sm-6 col-md-'.$width . ' col-lg-'.$width;
  }

  public static function getRowsAmount($cardAmount, $columnAmount) {
    return (int)($cardAmount/$columnAmount);
  }

  public static function divideColumnsAmountIntoRows($columns, $numberOfColumns) {

    $rowSize = (int)(sizeof($columns) / $numberOfColumns);
    $columnOffset = 0;
    $indexedColumns = [];

    for ($row=0; $row<=$rowSize; $row++) {
      $rowColumns = array_slice($columns, $columnOffset, $numberOfColumns);
      $indexedColumns[$row] = $rowColumns;
      $columnOffset = $columnOffset + $numberOfColumns;
    }

    return $indexedColumns;

  }

}
