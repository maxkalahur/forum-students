<?php
namespace App\Services;

trait LogTrait {

    private $test;

    private function log( $error ) {
       ///...
    }
}


class ServicesContainer
{
    use LogTrait;

    private $servicesMapping;

    public function __construct() {
        $this->servicesMapping = [
            'emailSender' => 'App\Services\EmailSender\EmailSender',
        ];

        $this->log('error here!');
        $this->test;
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