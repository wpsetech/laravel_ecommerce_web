@extends('layouts.front')

@section('title')
    Welcome to E-Store
@endsection
@include('layouts.inc.frontnavbar')
@section('content')
    <div class="container mt-5">
        <form action="{{url('/')}}" method="post" novalidate

            >

            {{csrf_field()}}
         <div class="row">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <h6>
                            Basic Details
                        </h6>
                        <hr>
                        <div class="row checkout-form">
                            <div class="col-md-6 mt-3">
                                <label for="">First Name</label>
                                <input type="text" class="form-control name" value="{{ Auth::user()->name }}" name="firstname" placeholder="Enter First Name">
                                <span class="text-danger" id="fname_error"></span>
                                @error('firstname')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Last Name</label>
                                <input type="text" class="form-control lastname" value="{{ Auth::user()->lastname }}" name="lastname" placeholder="Enter Last Name">
                                <span class="text-danger" id="lname_error"></span>
                                @error('lastname')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Email</label>
                                <input type="email" class="form-control email" value="{{ Auth::user()->email }}" name="email" placeholder="Enter Email">
                                <span class="text-danger" id="email_error"></span>
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Phone Number</label>
                                <input type="number" class="form-control phone" value="{{ Auth::user()->phone }}" name="phone" placeholder="Enter Phone Number">
                                <span class="text-danger" id="phone_error"></span>
                                @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Address 1</label>
                                <input type="text" class="form-control address1" value="{{ Auth::user()->address1 }}" name="address1" placeholder="Enter Address 1">
                                <span class="text-danger" id="address1_error"></span>
                                @error('address1')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Address 2</label>
                                <input type="text" class="form-control address2" value="{{ Auth::user()->address2 }}" name="address2" placeholder="Enter Address 2">
                                <span class="text-danger" id="address2_error"></span>
                                @error('address2')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">City</label>
                                <input type="text" class="form-control city" value="{{ Auth::user()->city }}" name="city" placeholder="Enter City">
                                <span class="text-danger" id="city_error"></span>
                                @error('city')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">State</label>
                                <input type="text" class="form-control state" value="{{ Auth::user()->state }}" name="state" placeholder="Enter State">
                                <span class="text-danger" id="state_error"></span>
                                @error('state')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Country</label>
                                <input type="text" class="form-control country" value="{{ Auth::user()->country }}" name="country" placeholder="Enter Country">
                                <span class="text-danger" id="country_error"></span>
                                @error('country')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Pin Code</label>
                                <input type="number" class="form-control pincode" value="{{ Auth::user()->pincode }}" name="pincode" placeholder="Enter Pin Code">
                                <span class="text-danger" id="pincode_error"></span>
                                @error('pincode')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                       <h6> Order Details </h6>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                </tr>
                            <hr>
                            </thead>

                            <tbody>
                                @foreach($cartitems as $item)
                                    <tr>
                                        <td>{{$item->products->name}}</td>
                                        <td>Rs {{$item->products->selling_price}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <hr>
                    </div>
                    <button type="submit" class="btn btn-success">Place Order || COD</button>
                    <button type="submit" class="btn btn-primary" id="checkout-button">Pay with Stripe</button>


{{--                                            @include('frontend.stripecheckout')--}}
{{--                        <a href="#StripeCardModal" class="btn btn-primary my-1" data-toggle="modal" >Pay with Stripe</a>--}}



                </div>
            </div>
        </div>
        </form>
        <form action="/" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary" id="checkout-button">Pay with Stripe</button>
        </form>
    </div>
@endsection

