<?php
namespace App\Framework;



class View
{
    public static $config;

    public static function show( $templateName, $data = [] ) {

        self::$config->get('vk_info');

        include 'app/Views/header.view.php';

        if( file_exists('app/Views/'.$templateName.'.view.php') ) {
            include 'app/Views/'.$templateName.'.view.php';
        }
        else {
            throw new \Exception('File doesn\'t exist');
        }

        include 'app/Views/footer.view.php';
    }


}