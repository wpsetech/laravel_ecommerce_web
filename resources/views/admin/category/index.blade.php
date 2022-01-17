@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
           <h4>All Categories</h4>
            <a  href="{{route('add.category')}}"><button class="btn btn-success float-end">Add New</button></a>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-responsive-sm">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                @foreach($category as $item)
                    <tr>
                        <th>{{ $category->firstItem()+$loop->index }}</th>
                        <td>{{$item->name}}</td>
                        <td>{{$item->description}}</td>
                        <td>
                            <img style="height: 80px; width: 110px;" src="{{asset('admin/img/category/'.$item->image)}}">
                        </td>
                        <td>
                            <a href="{{ url('category/edit/'.$item->id)}} "><button class="btn btn-sm btn-primary">Edit</button></a>
                            <a href="{{ url('category/delete/'.$item->id) }}"><button class="btn btn-sm btn-danger">Delete</button></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
            {{ $category->links() }}
        </div>

    </div>
@endsection
