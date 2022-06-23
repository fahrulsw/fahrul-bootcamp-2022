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
                        <label class="col-md-3 mt-2">Product Code</label>
                        <p class="form-control bg-light text-dark border-0 small col-md-8 mb-0">{{$row->product_code}}</p>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-md-3 mt-2">Product Name</label>
                        <p class="form-control bg-light text-dark border-0 small col-md-8 mb-0">{{$row->product_name}}</p>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-md-3 mt-2">Product Price</label>
                        <p class="form-control bg-light text-dark border-0 small col-md-8 mb-0">{{number_format($row->product_price)}}</p>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-md-3 mt-2">Product Flag</label>
                        <p class="form-control bg-light text-dark border-0 small col-md-8 mb-0">{{($row->flag == 1? "Sale" : "Not Sale")}}</p>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-md-3 mt-2">Description</label>
                        <p class="form-control bg-light text-dark border-0 small col-md-8 mb-0">{!! $row->description !!}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <img src="{{asset($row->product_photo)}}" class="img-fluid" alt="{{$row->product_code}}">
                </div>
            </div>
        </div>
    </div>
@endsection