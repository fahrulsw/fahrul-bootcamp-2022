@extends('backend.layout.main')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{$title}}</h1>
        <a href="{{route('adminAddProducts')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm px-3"><i class="fas fa-pen fa-sm text-white-50 mr-2"></i> Tambah Data</a>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{$title}}</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Product Code</th>
                        <th>Product Name</th>
                        <th class="text-center">Photo</th>
                        <th>Price</th>
                        <th>Sale</th>
                        <th class="text-right">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(!$products)
                        <tr><td colspan="5" class="text-center">No Data</td></tr>
                    @endif
                    @foreach($products as $row)
                        <tr>
                            <td>{{$row->product_code}}</td>
                            <td>{{$row->product_name}}</td>
                            <td class="text-center"><img src="{{asset($row->product_photo)}}" alt="" height="30" class="rounded"></td>
                            <td>{{number_format($row->product_price)}}</td>
                            <td>{{($row->flag == 1? "Sale" : "Not Sale")}}</td>
                            <td class="text-right">
                                <a href="{{route('adminProductsDetail', $row->id)}}" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></a>
                                <a href="{{route('adminProductsEdit', $row->id)}}" class="btn btn-sm btn-warning"><i class="fas fa-pen"></i></a>
                                <a href="{{route('adminProductsDelete', $row->id)}}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Product Code</th>
                        <th>Product Name</th>
                        <th class="text-center">Photo</th>
                        <th>Price</th>
                        <th>Sale</th>
                        <th class="text-right">Action</th>
                    </tr>
                    </tfoot>
                </table>
                <div class="text-right">
                    {{ $products->appends(request()->query())->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection