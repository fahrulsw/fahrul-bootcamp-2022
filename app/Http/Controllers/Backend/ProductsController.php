<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductsController extends Controller
{
    //
    public function getIndex(Request $request) {
        $search = $request->get('search');
        $data['title'] = 'List Products';
        $data['products'] = DB::table('products')
            ->where(function ($q) use ($search) {
                if (isset($search)) {
                    $q->where('product_name','like','%'.$search.'%')
                        ->orwhere('product_code','like','%'.$search.'%')
                        ->orwhere('product_price.','like','%'.$search.'%');
                }
            })->paginate(10);
        return view('backend.page.products.index',$data);
    }
    public function getAdd() {
        $data['title'] = 'Add Products';

        return view('backend.page.products.add',$data);
    }
    public function postAddSave(Request $request) {
        $this->validate($request, [
            'product_code' => 'required',
            'product_name' => 'required',
            'product_price' => 'required',
            'flag' => 'required'
        ]);

        $uploadPath = public_path("uploads");
        $save['product_code'] = $request->get('product_code');
        $save['product_name'] = $request->get('product_name');
        $save['product_price'] = $request->get('product_price');
        $save['flag'] = $request->get('flag') == 1;
        $save['description'] = $request->get('description');

        if (!File::isDirectory($uploadPath)) {
            File::makeDirectory($uploadPath,755, true, true);
        }
        if ($request->hasFile('product_photo')) {
            $photo = $request->file('product_photo');
            $ext = $photo->getClientOriginalExtension();
            $rename = 'file_'.time().'.'.$ext;
            $save['product_photo'] = 'uploads/'.$rename;
            $photo->move($uploadPath,$rename);
        }
        DB::table('products')->insert($save);

        return redirect('admin/products')->with(["message"=>"Success Simpan"]);
    }

    public function getEdit($id) {
        $data['title'] = 'Edit Products';
        $data['row'] = DB::Table('products')->where('id',$id)->first();

        return view('backend.page.products.edit',$data);
    }

    public function postEditSave(Request $request,$id) {
        $this->validate($request, [
            'product_code' => 'required',
            'product_name' => 'required',
            'product_price' => 'required',
            'flag' => 'required'
        ]);
        $uploadPath = public_path("uploads");
        $save['product_code'] = $request->get('product_code');
        $save['product_name'] = $request->get('product_name');
        $save['product_price'] = $request->get('product_price');
        $save['flag'] = $request->get('flag') == 1;
        $save['description'] = $request->get('description');

        if (!File::isDirectory($uploadPath)) {
            File::makeDirectory($uploadPath,755, true, true);
        }
        if ($request->hasFile('product_photo')) {
            $photo = $request->file('product_photo');
            $ext = $photo->getClientOriginalExtension();
            $rename = 'file_'.time().'.'.$ext;
            $save['product_photo'] = 'uploads/'.$rename;
            $photo->move($uploadPath,$rename);
        }
        DB::table('products')->where('id',$id)->update($save);

        return redirect('admin/products')->with(["message"=>"Success Simpan"]);
    }

    public function getDetail($id) {
        $data['title'] = "Detail Products";
        $data['row'] = DB::Table('products')->where('id',$id)->first();

        return view('backend.page.products.detail',$data);
    }

    public function getDetele($id) {
        DB::Table('products')->where('id',$id)->delete();

        return redirect()->back()->with(["message"=>"Success Hapus"]);
    }
}