@extends('backend.layout.main')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{$title}}</h1>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="card mb-4 border-left-primary">
                <div class="card-body">
                    <div class="form-group row mb-3">
                        <label class="col-md-3 mt-2">Customers Name</label>
                        <p class="form-control bg-light text-dark border-0 small col-md-8 mb-0">{{$row->name}}</p>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-md-3 mt-2">Customers Email</label>
                        <p class="form-control bg-light text-dark border-0 small col-md-8 mb-0">{{$row->email}}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <img src="{{asset($row->photo)}}" class="img-fluid" alt="{{$row->name}}">
                </div>
            </div>
        </div>
    </div>
@endsection