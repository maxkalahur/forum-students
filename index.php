<?php
session_start();

define('APP_MODE', 'DEBUG');
define('SITE_ROOT', realpath(dirname(__FILE__)));
require __DIR__ . '/vendor/autoload.php';

//spl_autoload_register( function ($class_name) {
//    var_dump(  $class_name );
////    exit();
//    include $class_name . '.php';
//});

use App\Framework\App;
$app = new App();
$app->run();
//(new App())->run();




//
//Class a {
//
//    private $secret = 123;
//    public $abc = 'xxxzzxcvvb';
//    public static $stat = 1235567;
//
//    public function foo()
//    {
//        echo $this->secret;
//        echo $this->abc;
//    }
//
//    public static function boo()
//    {
//        echo self::$stat;
//    }
//}
//
//User::all();
//(new User)->all();
//
//$user1 = new User(1);
//$user2 = new User(2);
//
//$user1->getPost();
//$user2->getPost();
//
//
//a::boo();
//
//$obj = new a;
//$obj->foo();
//$obj->abc;


class b {

    public $time;

    public function __construct( $time )
    {
        $this->time = $time;
    }
}

//$c = new b;
//$c->time = "12:00";

$c = new b( "12:00" );
