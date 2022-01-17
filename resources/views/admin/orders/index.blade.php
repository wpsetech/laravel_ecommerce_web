@extends('layouts.admin')
@section('title')
    Orders
@endsection
@section('content')
   <div class="container">
       <div class="row">
           <div class="col-md-12">
               <div class="card">
                   <div class="card-header">
                       <h3>New Orders</h3>
                       <a href="{{url('order-history')}}" class="btn btn-warning float-end">Order History</a>
                   </div>
                   <div class="card-body">
                       <table class="table table-bordered ">
                           <thead>
                           <tr>
                               <th>Order Date</th>
                               <th>Tracking Number</th>
                               <th>Total Price</th>
                               <th>Status</th>
                               <th>Action</th>
                           </tr>
                           </thead>
                           <tbody>
                           @foreach($orders as $item)
                               <tr>
                                   <td>{{date('d-m-v',strtotime($item->created_at))}}</td>
                                   <td>{{$item->tracking_no}}</td>
                                   <td>{{$item->total_price}}</td>
                                   <td>{{$item->status == '0' ? 'Pending' : 'Completed'}}</td>
                                   <td>
                                       <a class="btn btn-primary" href="{{url('admin/view-order/'.$item->id)}}">View</a>

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
