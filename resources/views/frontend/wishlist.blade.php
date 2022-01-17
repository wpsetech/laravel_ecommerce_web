@extends('layouts.front')


@section('title')
    Your Wishlist items


@endsection

@include('layouts.inc.frontnavbar')
@section('content')
    <div class="py-3 mb-4 shadow-sm bg-gradient-primary border-bottom">
        <div class="container">
            <h6 class="mb-0 text-light"><a class="text-light" href="{{url('/')}}">Home</a>  / <a class="text-light" href="{{url('/wishlist')}}">Wishlist</a></h6>
        </div>

    </div>
    <div class="container my-5">
        <div class="card shadow">
            <div class="card-body">
                @if($wishlist->count() > 0)
                    <div class="card-body">

                        @foreach($wishlist as $item)
                            <div class="row">
                                <div class="col-md-2 py-3">
                                    <img style="height: 100px; width: 100px;" src="{{asset('admin/img/products/'.$item->products->image)}}">

                                </div>
                                <div class="col-md-2 py-4">
                                    <h6>{{$item->products->name}}</h6>
                                </div>
                                <div class="col-md-2 py-4">
                                    <h6>Rs {{$item->products->selling_price}}</h6>

                                </div>
                                <div class="col-md-3 py-4">
                                    <form action="{{url('/add-to-cart')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{$item->products->id}}">

                                        @if($item->products->qty >0)
                                            <button type="submit" class="btn btn-success me-3 float-start"><i class="fas fa-cart-arrow-down fa-lg"></i> Add to Cart</button>

                                        @endif

                                    </form>

                                </div>
                                <div class="col-md-3 py-4">
                                    <form method="get" action="{{url('delete-wishlist-item')}}">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{$item->products->id}}">
                                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Remove</button>

                                    </form>

                                </div>
                            </div>


                        @endforeach

                    </div>

                @else
                    <h4>There are no products in wishlist</h4>
                @endif
            </div>
        </div>

    </div>
@endsection
