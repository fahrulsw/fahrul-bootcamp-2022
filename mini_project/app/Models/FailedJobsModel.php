<?php
namespace App\Models;

use Crocodic\LaravelModel\Core\Model;

class FailedJobsModel extends Model
{
    
	public $id;
	public $uuid;
	public $connection;
	public $queue;
	public $payload;
	public $exception;
	public $failed_at;

}