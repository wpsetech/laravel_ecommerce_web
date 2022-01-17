@extends('layouts.admin')

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>View Orders
                            <a class="btn btn-warning float-end" href="{{url('orders')}}">Back</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 order-details">
                                <h4>Shipping Details</h4>
                                <hr>
                                <label>First Name</label>
                                <div class="border p-1">{{$orders->firstname}}</div>
                                <label>Last Name</label>
                                <div class="border p-1">{{$orders->lastname}}</div>
                                <label>Email</label>
                                <div class="border p-1">{{$orders->email}}</div>
                                <label>Contact no</label>
                                <div class="border p-1">{{$orders->phone}}</div>
                                <label>Shipping Address</label>
                                <div class="border p-1">
                                    {{$orders->address1}},<br>
                                    {{$orders->address2}},<br>
                                    {{$orders->city}},<br>
                                    {{$orders->state}},
                                    {{$orders->country}},
                                </div>
                                <label>Zip Code</label>
                                <div class="border p-1">{{$orders->pincode}}</div>

                            </div>
                            <div class="col-md-6">
                                <h4>Order Details</h4>
                                <hr>
                                <table class="table table-bordered ">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Image</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($orders->orderitems as $item)
                                        <tr>
                                            <td>{{$item->products->name}}</td>
                                            <td>{{$item->price}}</td>
                                            <td>
                                                <img style="height: 70px; width: 60px;" src="{{asset('admin/img/products/'.$item->products->image)}}">
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <h4 class="px-2">Grand Total: <span class="float-end">Rs {{$orders->total_price}}</span></h4>
                                <div class="mt-3">
                                    <form action="{{url('update-order/'.$orders->id)}}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <label>Order Status</label>
                                        <select class="form-select" name="order_status">
                                            <option {{$orders->status == '0' ? 'selected': ''}} value="0">Pending</option>
                                            <option {{$orders->status == '1' ? 'selected': ''}} value="1">Completed</option>
                                        </select>
                                        <button type="submit" class="btn btn-success float-end mt-3">Update</button>
                                    </form>
                                </div>


                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
