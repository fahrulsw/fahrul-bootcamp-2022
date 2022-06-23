<?php
namespace App\Repositories;

use App\Models\CartsModel;

class Carts extends CartsModel
{
    public static function getAllBySession()
    {
        return Carts::table()
        ->select
        (
            'carts.*',
            'products.product_name','products.product_code','products.product_photo','products.flag','products.description','products.product_price'
                )
                ->where('carts.customer_id',getCustSessions()->id)
                ->leftJoin('products','products.id','carts.product_id')
                ->get();
        
    }
    public static function countAllBySession()
    {
        return Carts::table()
            ->where('carts.customer_id',getCustSessions()->id)
            ->leftJoin('products','products.id','carts.product_id')
            ->count();
    }
}