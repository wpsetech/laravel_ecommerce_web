@extends('layouts.front')


@section('title')
    {{$products->name}}

@endsection
@section('links')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/json2/20160511/json2.min.js"></script>




@endsection
@include('layouts.inc.frontnavbar')
@section('content')
    <div class="py-3 mb-4 shadow-sm bg-gradient-primary border-bottom">
        <div class="container">
            <h6 class="mb-0 text-light">Collections / {{$products->category->name}} / {{$products->name}}</h6>
        </div>

    </div>
    <div class="container">
        <div class="card shadow product_data">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 border-right">
                        <img src="{{asset('admin/img/products/'.$products->image)}}" class="w-100">

                    </div>
                    <div class="col-md-8">
                        <h2 class="mb-0">
                            {{$products->name}}
                            @if($products->trending == '1')
                                <label style="font-size: 12px;" class="float-end badge bg-danger trending_tag">Trending</label>
                            @endif

                        </h2>
                        <hr>
                        <label class="me-3">Original Price : <s>Rs {{$products->original_price}}</s></label>
                        <label class="bold">Selling Price : <b class="text-primary">Rs {{$products->selling_price}}</b></label>
                        <p class="mt-3">
                            {!! $products->small_description !!}
                        </p>
                        <hr>
                        @if($products->qty >0)
                            <label class="badge bg-success">In stock</label>
                        @else
                            <label class="badge bg-danger">Out of stock</label>
                        @endif
                        <div class="row my-3">
                            <div class="col-md-6">
                                <form action="{{url('/add-to-cart')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{$products->id}}">

                                    @if($products->qty >0)
                                        <button type="submit" class="btn btn-success me-3 float-start"><i class="fas fa-cart-arrow-down fa-lg"></i> Add to Cart</button>

                                    @endif

                                </form>


                            </div>
                            <div class="col-md-6">
                                <form action="{{url('/add-to-wishlist')}}"  method="post">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{$products->id}}">

                                    @if($products->qty >0)
                                        <button type="submit" class="btn btn-primary me-3 float-start"><i class="fas fa-heart fa-lg"></i> Add to Wishlist</button>

                                    @endif

                                </form>
                            </div>


                        </div>
                    </div>
                </div>


            </div>

        </div>

    </div>



@endsection
@section('scripts')

@endsection
