@extends('layouts.front')

@section('title')
    Category
@endsection
@include('layouts.inc.frontnavbar')
@section('content')
    <div class="py-5">
        <h1 class="text-center text-primary py-5">All Categories</h1>
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
    @include('layouts.inc.footer')
@endsection
