<?php

namespace Drupal\super_module\NewController;

use Drupal\Core\Controller\ControllerBase;

class SuperController extends ControllerBase {

    function default() {
        $string ="<i>My Test</i>";
        return ['#markup' => $string];
    }

}