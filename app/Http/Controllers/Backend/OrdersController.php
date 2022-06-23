<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    //
    public function getIndex(Request $request) {
        $search = $request->get('search');
        $data['title'] = 'List Orders';
        $data['orders'] = DB::table('tr_orders')
        ->join('customers','customers.id','=','tr_orders.customers_id')
        ->select('tr_orders.*','customers.name as customer_name')
        ->where(function ($q) use ($search) {
            if (isset($search)) {
                $q->where('customers.name','like','%'.$search.'%')
                    ->orwhere('code_transaction','like','%'.$search.'%')
                    ->orwhere('total_price.','like','%'.$search.'%');
            }
        })->paginate(10);

        return view('backend.page.orders.index',$data);
    }

    public function getDetail($id) {
        $data['title'] = 'Detail Orders';

        $data['order'] = DB::table('tr_orders')
            ->join('customers','customers.id','=','tr_orders.customers_id')
            ->where('tr_orders.id',$id)
            ->select('tr_orders.*','customers.name as customer_name')
            ->first();
        $data['detail'] = DB::table('tr_orders_detail')
            ->where('tr_orders_id',$id)
            ->join('products','products.id','=','tr_orders_detail.products_id')
            ->select('tr_orders_detail.*',
                'products.product_code as product_code',
                'products.product_name as product_name',
                'products.product_photo as product_photo')
            ->get();
        return view('backend.page.orders.detail',$data);
    }
    public function getDelete($id) {
        DB::Table('tr_orders')->where('id',$id)->delete();

        return redirect()->back()->with(["message"=>"Success Hapus"]);
    }
}