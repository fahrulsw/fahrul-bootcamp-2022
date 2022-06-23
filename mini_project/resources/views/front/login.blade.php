@extends('template.front.layout')
@section('content')
    <div class="container" style="margin-bottom:100px; margin-top:100px;">
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

        <div class="card" style="padding:50px;">
            <form method="POST" action="{{url('login')}}">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input name="password" type="password" class="form-control" id="exampleInputPassword1">
                </div>

                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>

@endsection