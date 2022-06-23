@extends('backend.layout.main')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{$title}}</h1>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card mb-4 border-left-primary">
                <div class="card-body">
                    <div class="form-group row mb-3">
                        <label class="col-md-3 mt-2">Transaction Code</label>
                        <p class="form-control bg-light text-dark border-0 small col-md-8 mb-0">{{$order->code_transaction}}</p>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-md-3 mt-2">Customer Name</label>
                        <p class="form-control bg-light text-dark border-0 small col-md-8 mb-0">{{$order->customer_name}}</p>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-md-3 mt-2">Status</label>
                        <p class="form-control bg-light text-dark border-0 small col-md-8 mb-0">{{$order->status}}</p>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-md-3 mt-2">Price</label>
                        <p class="form-control bg-light text-dark border-0 small col-md-8 mb-0">{{number_format($order->total_price)}}</p>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-md-3 mt-2">Created At</label>
                        <p class="form-control bg-light text-dark border-0 small col-md-8 mb-0">{{date($order->created_at)}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Product Code</th>
                            <th>Product Name</th>
                            <th>Product Photo</th>
                            <th>Product Price</th>
                        </tr>
                        @foreach($detail as $row)
                            <tr>
                                <td>{{$row->product_code}}</td>
                                <td>{{$row->product_name}}</td>
                                <td><img src="{{asset($row->product_photo)}}" height="30" alt="{{$row->product_code}}"></td>
                                <td>{{number_format($row->price)}}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection