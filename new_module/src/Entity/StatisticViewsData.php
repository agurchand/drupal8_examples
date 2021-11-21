<?php

namespace Drupal\new_module\Entity;

use Drupal\views\EntityViewsData;

/**
 * Provides Views data for Statistic entities.
 */
class StatisticViewsData extends EntityViewsData {

  /**
   * {@inheritdoc}
   */
  public function getViewsData() {
    $data = parent::getViewsData();

    // Additional information for Views integration, such as table joins, can be
    // put here.
    return $data;
  }

}
