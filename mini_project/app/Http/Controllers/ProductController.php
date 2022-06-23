<?php

namespace App\Http\Controllers;

use App\Repositories\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public static function getDetail($id)
    {
        $data['product'] = Products::findById($id);

        return view('front.product_detail',$data);
    }
}
