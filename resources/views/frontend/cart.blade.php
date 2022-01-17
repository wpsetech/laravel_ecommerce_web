@extends('layouts.front')
{{--@extends('layouts.app')--}}

@section('title')
   Your cart items


@endsection

@include('layouts.inc.frontnavbar')
@section('content')
    <div class="py-3 mb-4 shadow-sm bg-gradient-primary border-bottom">
        <div class="container">
            <h6 class="mb-0 text-light"><a class="text-light" href="{{url('/')}}">Home</a>  / <a class="text-light" href="{{url('/cart')}}">Cart</a></h6>
        </div>

    </div>
    <div class="container my-5">
        <div class="card shadow">
            @if($cartitems->count() >0)
            <div class="card-body">
                @php $total = 0; @endphp
                @foreach($cartitems as $item)
                    <div class="row">
                        <div class="col-md-4 py-3">
                            <img style="height: 100px; width: 100px;" src="{{asset('admin/img/products/'.$item->products->image)}}">

                        </div>
                        <div class="col-md-4 py-4">
                            <h5>{{$item->products->name}}</h5>
                        </div>
                        <div class="col-md-2 py-4">
                            <h6>Rs {{$item->products->selling_price}}</h6>

                        </div>
                            <div class="col-md-2 py-4">
                                <form method="get" action="{{url('delete-cart-item')}}">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{$item->products->id}}">
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Remove</button>

                                </form>

                            </div>
                    </div>
                    @php $total += $item->products->selling_price; @endphp

                @endforeach

            </div>

            <div class="card-footer">
                <h6>Total Price Rs {{$total}}
                <a href="{{url('checkout')}}" class="btn btn-success float-end">Proceed to Checkout</a>
                </h6>
            </div>
            @else
                <div class="card-body text-center">
                    <h3>Your <i class="fa fa-shopping-cart"></i> cart is empty</h3>
                    <a class="btn btn-primary float-end" href="{{url('allproducts')}}">Continue Shopping</a>

                </div>
            @endif

        </div>

    </div>
@endsection
