<?php
namespace App\Models;

use App\Models\Model;


class User extends Model
{
	protected $table = 'users';
	protected $id, $name, $email, $password;

	public function topics() {

    }

	public function posts() {

    }
	
}