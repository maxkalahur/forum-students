<?php
namespace App\Services;


class ServicesContainer
{
    private $servicesMapping;

    public function __construct() {
        $this->servicesMapping = [
            'emailSender' => 'App\Services\emailSender\emailSender',
        ];
    }

    public function __get($name) {

        if( isset( $this->servicesMapping[$name] ) ) {
            return new $this->servicesMapping[$name]();
        }
        else {
            throw new \Exception('Wrong Service Name!!');
        }
    }

}