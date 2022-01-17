@extends('layouts.front')

@section('title')
    {{$category->name}}
@endsection
@include('layouts.inc.frontnavbar')
@section('content')

    <div class="py-3 mb-4 shadow-sm bg-gradient-primary border-bottom">
        <div class="container">
            <h6 class="mb-0 text-light">Collections / {{$category->name}}</h6>
        </div>

    </div>

    <div class="py-5">
        <h1 class="text-center text-primary py-5">{{$category->name}}</h1>
        <div class="container">
            <div class="row">

                @foreach($cate_products as $products)
                    <div class="col-md-3 py-3">
                        <a href="{{url('categories/'.$category->slug.'/'.$products->slug)}}">
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


@endsection
