<?php

namespace Drupal\new_module\Controller;

use Drupal\Core\Controller\ControllerBase;

class NewModuleController extends ControllerBase {

    public function first() {
        $build['#attached']['library'][] = 'new_module/mjsfiles';
        $build['#attached']['drupalSettings']['new_module']['myname'] = 'agur';

        $build['#type'] = 'markup';
        $build['#markup'] = '<p>Hi hello</p>';
        return $build;
    }

}