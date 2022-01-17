@extends('layouts.front')


@section('title')
    My Orders


@endsection

@include('layouts.inc.frontnavbar')
@section('content')
    <div class="container pt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                       <h3>My Orders</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered ">
                            <thead>
                            <tr>
                                <th>Tracking Number</th>
                                <th>Total Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $item)
                                <tr>
                                    <td>{{$item->tracking_no}}</td>
                                    <td>{{$item->total_price}}</td>
                                    <td>{{$item->status == '0' ? 'Pending' : 'Completed'}}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{url('view-order/'.$item->id)}}">View</a>
                                        <a class="btn btn-danger" href="{{url('delete-order/'.$item->id)}}">Delete</a>

                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
