
            @extends('layouts.admin')
            @section('content')
                <div class="card">
                    <div class="card-header">
                        <h4>All Products</h4>
                        <a  href="{{route('add.products')}}"><button class="btn btn-success float-end">Add New</button></a>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-responsive-sm">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Category</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Selling Price</th>
                                <th>Image</th>
                                <th>Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $item)
                                <tr>
                                    <th>{{ $products->firstItem()+$loop->index }}</th>
                                    <td>{{$item->Category->name}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->description}}</td>
                                    <td>{{$item->selling_price}}</td>
                                    <td>
                                        <img style="height: 80px; width: 100px;" src="{{asset('admin/img/products/'.$item->image)}}">
                                    </td>
                                    <td>
                                        <a href="{{url('product/edit/'.$item->id)}} "><button class="btn btn-sm btn-primary">Edit</button></a>
                                        <a href="{{url('product/delete/'.$item->id)}}"><button class="btn btn-sm btn-danger">Delete</button></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                        {{$products->links()}}
                    </div>

                </div>
            @endsection


