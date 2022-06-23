@extends('template.front.layout')
@section('content')
<div class="container" style="margin-top:50px;margin-bottom:50px;">
@if (\Session::has('danger'))
<div class="alert alert-danger">
    <ul>
        <li>{!! \Session::get('danger') !!}</li>
    </ul>
</div>
@elseif (\Session::has('success'))
<div class="alert alert-success">
    <ul>
        <li>{!! \Session::get('success') !!}</li>
    </ul>
</div>
@endif
<div class="row">
    <div class="col-7">
        <div class="card">
            @php
                $total = 0;
            @endphp
            @if(count($carts) > 0)
                @foreach($carts as $cart)
                <div class="card-body">
                    <div class="row">
                    <div class="col-4">
                        <!-- {{$cart->product_photo}} -->
                        <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="{{$cart->product_name}}" />
                    </div>
                    <div class="col-8">
                        <h4>{{$cart->product_name}}</h4>
                        <p>{{idrFormat($cart->product_price)}}</p>
                        <button onclick="confirm('Apakah anda yakin?')" class="btn btn-sm btn-danger">
                            <a href="{{url('cart/delete/'.$cart->id)}}" style="text-decoration:none;color:white;">
                            Delete
                            </a>
                        </button>
                    </div>
                    </div>
                </div>
                @php
                    $total += $cart->product_price;
                @endphp
                @endforeach
            @else
            <div class="card-body">
            <h4>Keranjang Belanja Kosong</h4>
            </div>
            @endif
        </div>
    </div>
    <div class="col-5">
        <div class="card" style="padding:25px;">
            <h4>Grand Total : {{idrFormat($total)}}</h4>
            <form method="POST" action="{{url('cart/checkout')}}">
                @csrf
                <button class="btn btn-sm btn-success" style="width:100%;margin-top:100px;">Check Out</button>
            </form>
        </div>
    </div>
</div>
</div>
@endsection