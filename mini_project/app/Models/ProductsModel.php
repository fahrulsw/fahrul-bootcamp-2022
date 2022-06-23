<?php
namespace App\Models;

use Crocodic\LaravelModel\Core\Model;

class ProductsModel extends Model
{
    
	public $id;
	public $product_name;
	public $product_code;
	public $product_photo;
	public $product_price;
	public $flag;
	public $description;
	public $created_at;
	public $updated_at;

}