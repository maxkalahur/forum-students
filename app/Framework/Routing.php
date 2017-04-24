<?php
namespace App\Framework;

use \Exception;
use App\Auth\Auth;

class Routing
{

    private $routes = [];

    private function __construct() {

        include __DIR__ . '/../routes.php';
        $this->routes = $_routes;
    }

    public static function init() {

        static $instance;
        if( $instance ) return $instance;

        $instance = new Routing;
        return $instance;
    }

    public function getCurrRouteHandler()
    {
        $uriSections = explode('?', $_SERVER['REQUEST_URI'], 2);
        $route = ( $uriSections[0] != '/' ) ? rtrim($uriSections[0],'/') : '/';
        foreach ($this->routes as $routePattern => $val) {
            if( preg_match( '/^'.addcslashes($routePattern,'/').'$/', $route) ) {

                if( $this->checkPolicy( $val ) ) {
                    return $val['handler'];
                }

                return false;
            }

        }

        return false;
    }

    private function checkPolicy( $route ) {

        if( isset($route['policy']) ) {

            if( $route['policy'] == 'is_admin' ) {
                if( Auth::getLoggedUser()->is_admin !== true ) {
                    return false;
                }
            }

            if( $route['policy'] == 'is_user' ) {
                if( !Auth::getLoggedUser() ) {
                    return false;
                }
            }

        }

        return true;
    }

    public static function getRouteArgs()
    {
        $uriSections = explode('?', $_SERVER['REQUEST_URI'], 2);
        return array_filter(explode( '/', $uriSections[0] ));
    }
}