<?php

namespace Drupal\new_module\Plugin\Block;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\new_module\Services\MyService;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 *
 * @Block(
 *   id = "new_module_block",
 *   admin_label = @Translation("New Block")
 * )
 */

class NewBlock extends BlockBase implements ContainerFactoryPluginInterface {

    protected $myservice;

    public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition){
        return new static(
            $configuration,
            $plugin_id,
            $plugin_definition,
            $container->get('new_module.myservice')
        );
    }

    public function __construct(array $configuration, $plugin_id, $plugin_definition, MyService $myservice)
    {
        parent::__construct($configuration, $plugin_id, $plugin_definition);
        $this->myservice = $myservice;
    }

    public function build()
    {
        return ['#markup' => '<p>'.$this->myservice->printme().'</p>', "#cache" => array('max-age' => 0)];
    }

}