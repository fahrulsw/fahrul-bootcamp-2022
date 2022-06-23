@extends('backend.layout.main')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{$title}}</h1>
    </div>
    <form action="{{route('adminCustomersEditSave',$row->id)}}" method="POST" class="row" enctype="multipart/form-data">
        @csrf
        <div class="col-md-8">
            <div class="card mb-4 border-left-primary">
                <div class="card-body">
                    <div class="form-group row mb-3">
                        <label class="col-md-3 mt-2">Customers Name</label>
                        <input type="text" name="name" class="form-control bg-dark text-light border-0 small col-md-8" required value="{{$row->name}}">
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-md-3 mt-2">Customers Email</label>
                        <input type="email" name="email" class="form-control bg-dark text-light border-0 small col-md-8" required value="{{$row->email}}">
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-md-3 mt-2">Customers Photo</label>
                        <input type="file" name="photo" class="form-control-file bg-dark text-light border-0 small col-md-8" style="padding-top: 7px;">
                        <p class="small offset-sm-3 mb-0">Gambar bisa dikosongi jika tidak ingin mengganti gambar sebelumnya</p>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-md-3 mt-2">Customers Password</label>
                        <input type="password" name="password" class="form-control bg-dark text-light border-0 small col-md-8">
                        <input type="password" class="form-control bg-dark text-light border-0 small col-md-8" style="display: none" >
                        <p class="small offset-sm-3">Password bisa dikosongi jika tidak ingin mengganti password sebelumnya</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <p>
                        Pastikan data yang anda masukan sudah sesuai dengan data yang diminta dan pastikan tidak kosong.
                    </p>
                    <a href="{{route('adminProducts')}}" class="btn btn-outline-dark">Batal</a>
                    <button type="submit" class="btn btn-outline-success">Simpan Data</button>
                </div>
            </div>
        </div>
    </form>
@endsection