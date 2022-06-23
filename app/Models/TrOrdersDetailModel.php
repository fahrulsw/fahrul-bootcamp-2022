<?php
namespace App\Models;

use Crocodic\LaravelModel\Core\Model;

class TrOrdersDetailModel extends Model
{
    
	public $id;
	public $tr_orders_id;
	public $product_id;
	public $price;
	public $created_at;
	public $updated_at;

}