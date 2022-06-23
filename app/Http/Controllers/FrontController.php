<?php

namespace App\Http\Controllers;

use App\Repositories\Products;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public static function getIndex()
    {
        $data['products'] = Products::getAll();

        return view('front.index',$data);
    }
}
