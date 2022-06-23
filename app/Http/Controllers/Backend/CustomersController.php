<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class CustomersController extends Controller
{
    //
    public function getIndex(Request $request) {
        $search = $request->get('search');
        $data['title'] = 'List Customers';
        $data['customers'] = DB::table('customers')
            ->where(function ($q) use ($search) {
                if (isset($search)) {
                    $q->where('name','like','%'.$search.'%')
                        ->orwhere('email.','like','%'.$search.'%');
                }
            })->paginate(10);
        return view('backend.page.customers.index',$data);
    }
    public function getAdd() {
        $data['title'] = 'Add Customers';

        return view('backend.page.customers.add',$data);
    }
    public function postAddSave(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        $uploadPath = public_path("uploads");
        $save['name'] = $request->get('name');
        $save['email'] = $request->get('email');
        $save['password'] = Hash::make($request->get('password'));

        if (!File::isDirectory($uploadPath)) {
            File::makeDirectory($uploadPath,755, true, true);
        }
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $ext = $photo->getClientOriginalExtension();
            $rename = 'file_'.time().'.'.$ext;
            $save['photo'] = 'uploads/'.$rename;
            $photo->move($uploadPath,$rename);
        }
        DB::table('customers')->insert($save);

        return redirect('admin/customers')->with(["message"=>"Success Simpan"]);
    }

    public function getEdit($id) {
        $data['title'] = 'Edit Products';
        $data['row'] = DB::Table('customers')->where('id',$id)->first();

        return view('backend.page.customers.edit',$data);
    }

    public function postEditSave(Request $request,$id) {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required'
        ]);

        $uploadPath = public_path("uploads");
        $save['name'] = $request->get('name');
        $save['email'] = $request->get('email');
        if ($request->get('password')) {
            $save['password'] = Hash::make($request->get('password'));
        }

        if (!File::isDirectory($uploadPath)) {
            File::makeDirectory($uploadPath,755, true, true);
        }
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $ext = $photo->getClientOriginalExtension();
            $rename = 'file_'.time().'.'.$ext;
            $save['photo'] = 'uploads/'.$rename;
            $photo->move($uploadPath,$rename);
        }
        DB::table('customers')->where('id',$id)->update($save);

        return redirect('admin/customers')->with(["message"=>"Success Simpan"]);
    }

    public function getDetail($id) {
        $data['title'] = "Detail Customers";
        $data['row'] = DB::Table('customers')->where('id',$id)->first();

        return view('backend.page.customers.detail',$data);
    }

    public function getDetele($id) {
        DB::Table('customers')->where('id',$id)->delete();

        return redirect()->back()->with(["message"=>"Success Hapus"]);
    }
}