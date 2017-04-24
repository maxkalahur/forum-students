<?php
namespace App\Framework\Auth;

use \Exception;
use App\Database\DB;
use App\Models\User;

class Auth implements AuthInterface
{
    private static $user;

    public static function login( Array $credentials ){

        $arguments = [$credentials['email'],md5($credentials['pass'])];

        // DB select
        $res = DB::select("SELECT * FROM users WHERE `email` =? AND `password` = ?",$arguments);
        if(!empty($res)) {
            $user = (new User())->hydrate($res);
            $_SESSION['user_id'] = $res[0]['id'];
            self::$user = $user;
            return true;
        }
        else return false;

    }

    public static function logout(){
        unset($_SESSION['user_id']);
    }

    public static function register( User $user ) {
        $user->save();
    }

    public static function getLoggedUser() {
        if( isset($_SESSION['user_id']) && !self::$user ) {
            self::$user = User::get( $_SESSION['user_id'] );
        }
        return self::$user;
    }

    public static function CheckAuthSession(){

    }
}