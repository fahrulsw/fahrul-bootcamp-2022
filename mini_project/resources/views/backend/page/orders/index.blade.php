@extends('backend.layout.main')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{$title}}</h1>
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
                        <th>Code Transaction</th>
                        <th>Customers Name</th>
                        <th>Price</th>
                        <th>Created At</th>
                        <th class="text-right">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(!$orders)
                        <tr>
                            <td colspan="5" class="text-center">No Data</td>
                        </tr>
                    @endif
                    @foreach($orders as $row)
                        <tr>
                            <td>{{$row->code_transaction}}</td>
                            <td>{{$row->customer_name}}</td>
                            <td>{{number_format($row->total_price)}}</td>
                            <td>{{$row->status}}</td>
                            <td class="text-right">
                                <a href="{{route('adminOrdersDetail', $row->id)}}" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></a>
                                <a href="{{route('adminOrdersDelete', $row->id)}}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Code Transaction</th>
                        <th>Customers Name</th>
                        <th>Price</th>
                        <th>Created At</th>
                        <th class="text-right">Action</th>
                    </tr>
                    </tfoot>
                </table>
                <div class="text-right">
                    {{ $orders->appends(request()->query())->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection