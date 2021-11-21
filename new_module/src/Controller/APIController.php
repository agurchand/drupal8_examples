<?php

namespace Drupal\new_module\Controller;

use Drupal\Component\Serialization\Json;
use Drupal\Core\DependencyInjection\ContainerInjectionInterface;
use Drupal\Core\Http\ClientFactory;
use Laminas\Diactoros\Response\JsonResponse;
use Symfony\Component\DependencyInjection\ContainerInterface;

class APIController implements ContainerInjectionInterface {

    protected $client;

    static public function create(ContainerInterface $container) {
        return new static(
            $container->get('http_client_factory')
        );
    }

    public function __construct(ClientFactory $clientFactory)
    {
        $this->client = $clientFactory->fromOptions(
            [
                'base_uri' => 'http://localhost/php-rest-api/api/'
            ]
        );
    }

    public function index() {
        
        // $res = $this->client->get('example/get', [
        //    'query'=> [
        //        'drilldowns' => 'Nation',
        //        'measures' => 'Population'
        //    ] 
        // ]);


        $post_options = [
            'http_errors' => FALSE,
            'body' => [
                'drilldowns' => 'Nation',
                'measures' => 'Population'
            ]
          ];


        $res = $this->client->put('example/put', $post_options);

        $data = Json::decode($res->getBody());

        return new JsonResponse($data);
    }
    

}