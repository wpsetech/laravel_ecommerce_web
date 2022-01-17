
@extends('layouts.front')

@section('title')
    Welcome to E-Store
@endsection
@include('layouts.inc.frontnavbar')
@section('content')
    @include('layouts.inc.slider')
    <div class="py-5">
        <h1 class="text-center text-primary py-5">Featured Products</h1>
        <div class="container">

<div class="row">




            <div class="swiper products-slider">

                <div class="swiper-wrapper">

                    @foreach($featured_products as $products)


                    <div class="swiper-slide ">




                                <a href="{{url('view'.$products->slug)}}">
                                    <div class="card slide">
                                        <img style="height: 300px" src="{{asset('admin/img/products/'.$products->image)}}">
                                        <div class="card-body">
                                            <h5>{{$products->name}}</h5>
                                            <small>Rs {{$products->selling_price}}</small>

                                        </div>

                                    </div>
                                </a>





                    </div>

                    @endforeach



                </div>

            </div>

{{--                    @foreach($featured_products as $products)--}}
{{--                        <div class="col-md-3 py-3">--}}
{{--                        <a href="{{url('view'.$products->slug)}}">--}}
{{--                            <div class="card">--}}
{{--                                <img style="height: 300px" src="{{asset('admin/img/products/'.$products->image)}}">--}}
{{--                                <div class="card-body">--}}
{{--                                    <h5>{{$products->name}}</h5>--}}
{{--                                    <small>Rs {{$products->selling_price}}</small>--}}

{{--                                </div>--}}

{{--                            </div>--}}
{{--                        </a>--}}

{{--                        </div>--}}
{{--                    @endforeach--}}




</div>

        </div>

    </div>

    <div class="container text-center">
        <a href="{{url('allproducts')}}" ><button type="button" class="btn btn-lg bg-gradient-primary"><i class="fas fa-eye"></i> View All Products</button></a>
    </div>

{{--    for trending category--}}
    <div class="py-5">
        <h1 class="text-center text-primary py-5">Trending Categories</h1>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        @foreach($category as $item)
                            <div class="col-md-3 mb-3 py-3">
                                <a href="{{url('view-category/'.$item->slug)}}" >
                                    <div class="card">
                                        <img style="height: 300px" src="{{asset('admin/img/category/'.$item->image)}}">
                                        <div class="card-body">
                                            <h5>{{$item->name}}</h5>
                                            <small>{{$item->description}}</small>
                                            <i class="fas fa-eye fa-lg"></i>
                                        </div>

                                    </div>
                                </a>

                            </div>
                        @endforeach
                    </div>

                </div>


            </div>

        </div>

    </div>
    <div class="container text-center">
        <a href="{{url('category')}}" ><button type="button" class="btn btn-lg bg-gradient-primary"> <i class="fas fa-eye"></i> View All Categories</button></a>
    </div>


@include('layouts.inc.footer')
@endsection
@section('scripts')


@endsection
