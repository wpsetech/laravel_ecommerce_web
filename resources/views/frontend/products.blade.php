@extends('layouts.front')

@section('title')
    Welcome to E-Store
@endsection
@include('layouts.inc.frontnavbar')
@section('content')
    <div class="container">
        <h1 class="text-center text-primary py-5">All Products</h1>
    </div>

    <div class="container-fluid py-5">
        <div class="row">
            <div class="col-xs-12 ">
                <nav>
                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active navbar-brand" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">All Products</a>
                        <a class="nav-item nav-link navbar-brand" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Mobiles</a>
                        <a class="nav-item nav-link navbar-brand" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Laptops</a>
                        <a class="nav-item nav-link navbar-brand" id="nav-about-tab" data-toggle="tab" href="#nav-about" role="tab" aria-controls="nav-about" aria-selected="false">Head Phones</a>
                        <a class="nav-item nav-link navbar-brand" id="nav-about-tab" data-toggle="tab" href="#nav-tablets" role="tab" aria-controls="nav-about" aria-selected="false">Tablets</a>
                        <a class="nav-item nav-link navbar-brand" id="nav-about-tab" data-toggle="tab" href="#nav-shirts" role="tab" aria-controls="nav-about" aria-selected="false">Clothes</a>
                        <a class="nav-item nav-link navbar-brand" id="nav-about-tab" data-toggle="tab" href="#nav-bags" role="tab" aria-controls="nav-about" aria-selected="false">Bags</a>
                    </div>
                </nav>
                <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="container">
                            <div class="row">
                                <div class="py-5">
                                    <div class="container">
                                        <div class="row">
                                            @foreach($allproducts as $products)
                                                <div class="col-md-3 py-3">
                                                    <a href="{{url('view'.$products->slug)}}">
                                                    <div class="card">
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

                                </div>


                            </div>

                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div class="container">
                            <div class="row">
                                <div class="py-5">
                                    <div class="container">
                                        <div class="row">
                                            @foreach($mobile_pro as $product)
                                                <div class="col-md-3 py-3">
                                                    <a href="{{url('view'.$product->slug)}}">

                                                    <div class="card">
                                                        <img style="height: 300px" src="{{asset('admin/img/products/'.$product->image)}}">
                                                        <div class="card-body">
                                                            <h5>{{$product->name}}</h5>
                                                            <small>Rs {{$product->selling_price}}</small>

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

                    </div>
                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                        <div class="container">
                            <div class="row">
                                <div class="py-5">
                                    <div class="container">
                                        <div class="row">
                                            @foreach($laptop_pro as $product)
                                                <div class="col-md-3 py-3">
                                                    <a href="{{url('view'.$product->slug)}}">

                                                    <div class="card">
                                                        <img style="height: 300px" src="{{asset('admin/img/products/'.$product->image)}}">
                                                        <div class="card-body">
                                                            <h5>{{$product->name}}</h5>
                                                            <small>Rs {{$product->selling_price}}</small>

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
                    </div>
                    <div class="tab-pane fade" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                        <div class="container">
                            <div class="row">
                                <div class="py-5">
                                    <div class="container">
                                        <div class="row">
                                            @foreach($headphones_pro as $product)
                                                <div class="col-md-3 py-3">
                                                    <a href="{{url('view'.$product->slug)}}">

                                                    <div class="card">
                                                        <img style="height: 300px" src="{{asset('admin/img/products/'.$product->image)}}">
                                                        <div class="card-body">
                                                            <h5>{{$product->name}}</h5>
                                                            <small>Rs {{$product->selling_price}}</small>

                                                        </div>

                                                    </div>
                                                    </a>
                                                </div>
                                            @endforeach


                                        </div>


                                    </div>

                                </div>


                            </div>

                        </div>                    </div>
                    <div class="tab-pane fade" id="nav-tablets" role="tabpanel" aria-labelledby="nav-about-tab">
                        <div class="container">
                            <div class="row">
                                <div class="py-5">
                                    <div class="container">
                                        <div class="row">
                                            @foreach($tablet_pro as $product)
                                                <div class="col-md-3 py-3">
                                                    <a href="{{url('view'.$product->slug)}}">

                                                    <div class="card">
                                                        <img style="height: 300px" src="{{asset('admin/img/products/'.$product->image)}}">
                                                        <div class="card-body">
                                                            <h5>{{$product->name}}</h5>
                                                            <small>Rs {{$product->selling_price}}</small>

                                                        </div>

                                                    </div>
                                                    </a>
                                                </div>
                                            @endforeach


                                        </div>


                                    </div>

                                </div>


                            </div>

                        </div>                    </div>
                    <div class="tab-pane fade" id="nav-shirts" role="tabpanel" aria-labelledby="nav-about-tab">
                        <div class="container">
                            <div class="row">
                                <div class="py-5">
                                    <div class="container">
                                        <div class="row">
                                            @foreach($clothes_pro as $product)
                                                <div class="col-md-3 py-3">
                                                    <a href="{{url('view'.$product->slug)}}">

                                                    <div class="card">
                                                        <img style="height: 300px" src="{{asset('admin/img/products/'.$product->image)}}">
                                                        <div class="card-body">
                                                            <h5>{{$product->name}}</h5>
                                                            <small>Rs {{$product->selling_price}}</small>

                                                        </div>

                                                    </div>
                                                    </a>
                                                </div>
                                            @endforeach


                                        </div>


                                    </div>

                                </div>


                            </div>

                        </div>                    </div>
                    <div class="tab-pane fade" id="nav-bags" role="tabpanel" aria-labelledby="nav-about-tab">
                        <div class="container">
                            <div class="row">
                                <div class="py-5">
                                    <div class="container">
                                        <div class="row">
                                            @foreach($bags_pro as $product)
                                                <div class="col-md-3 py-3">
                                                    <a href="{{url('view'.$product->slug)}}">

                                                    <div class="card">
                                                        <img style="height: 300px" src="{{asset('admin/img/products/'.$product->image)}}">
                                                        <div class="card-body">
                                                            <h5>{{$product->name}}</h5>
                                                            <small>Rs {{$product->selling_price}}</small>

                                                        </div>

                                                    </div>
                                                    </a>
                                                </div>
                                            @endforeach


                                        </div>


                                    </div>

                                </div>


                            </div>

                        </div>                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
    </div>
    @include('layouts.inc.footer')
@endsection
