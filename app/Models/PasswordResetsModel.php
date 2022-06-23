<?php
namespace App\Models;

use Crocodic\LaravelModel\Core\Model;

class PasswordResetsModel extends Model
{
    
	public $email;
	public $token;
	public $created_at;

}