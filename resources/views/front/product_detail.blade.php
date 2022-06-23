@extends('template.front.layout')
@section('content')
        <!-- Header-->
        <header class="bg-dark py-5 mb-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">{{$product->product_name}}</h1>
                </div>
            </div>
        </header>

        <div class="container" style="margin-bottom:200px;">
            <div class="row">
                <div class="col-12">
                    <div class="card" style="padding:100px;text-align:center">
                        <img class="card-img-top" src="{{asset($product->product_photo)}}" alt="{{$product->product_name}}" />

                        <p style="margin-top:100px;">
                        {!!$product->description!!}
                        </p>
                    </div>
                </div>
            </div>
        </div>

@endsection