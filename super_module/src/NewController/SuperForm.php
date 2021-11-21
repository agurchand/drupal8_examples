<?php

namespace Drupal\super_module\NewController;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class SuperForm extends FormBase {

    public function getFormId() {
        return 'super_form';
    }

    public function buildForm(array $form, FormStateInterface $form_state)
    {
        $form['name'] = [
            '#type' => 'textfield',
            '#title' => 'Name',
            '#description' => 'Enter name'            
        ];

        $form['submit'] = [
            '#type' => 'submit',
            '#value' => 'Submit'
        ];

        return $form;
    }

    public function submitForm(array &$form, FormStateInterface $form_state)
    {
        kint($form_state->getValues());
    }

}