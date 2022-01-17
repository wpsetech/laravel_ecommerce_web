@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Edit Product</h4>
        </div>
        <div class="card-body">

            <form action="{{url('product/update/'.$products->id)}}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-12 mb-3">
                        <select style=" width: 100%;"; class="custom-select form-control" name="cate_id">
                            <option value="">Select Category</option>
                            @foreach($category as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>

                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Name</label>
                        <div class="input-group input-group-outline my-1">

                            <input type="text" class="form-control" name="name" value="{{ $products->name }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Slug</label>

                        <div class="input-group input-group-outline my-1">
                            <input type="text" class="form-control" name="slug" value="{{ $products->slug }}">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">Small Description</label>

                        <div class="input-group input-group-outline my-1">
                            <textarea name="small_description" rows="3"  class="form-control">{{ $products->small_description }}</textarea>

                        </div>
                    <div class="col-md-12">
                        <label class="form-label">Description</label>

                        <div class="input-group input-group-outline my-1">
                            <textarea name="description"  rows="5"  class="form-control" >{{ $products->description }}</textarea>

                        </div>
                    </div>

                        <div class="col-md-6">
                            <label class="form-label">Original Price</label>

                            <div class="input-group input-group-outline my-1">
                                <input  type="number" class="form-control" name="original_price" value="{{ $products->original_price }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Selling Price</label>

                            <div class="input-group input-group-outline my-1">
                                <input type="number" class="form-control" name="selling_price" value="{{ $products->original_price }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Quantity</label>

                            <div class="input-group input-group-outline my-1">
                                <input type="number" class="form-control" name="qty" value="{{ $products->original_price }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Tax</label>

                            <div class="input-group input-group-outline my-1">
                                <input type="number" class="form-control" name="tax" value="{{ $products->original_price }}">
                            </div>
                        </div>

                    <div class="col-md-6">
                        <label class="" >Status</label>

                        <div class="input-group input-group-outline my-1">
                            <input type="checkbox" {{ $products->status == "1" ? 'checked': '' }}  name="status" >
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="" >Popular</label>

                        <div class="input-group input-group-outline my-1">
                            <input type="checkbox" {{ $products->trending == "1" ? 'checked': '' }} name="trending" >
                        </div>
                    </div>

                    <div class="col-md-12">
                        <label class="form-label">Meta Title</label>

                        <div class="input-group input-group-outline my-1">
                            <input type="text" class="form-control" name="meta_title" value="{{ $products->meta_title }}">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <label class="form-label">Meta Description</label>

                        <div class="input-group input-group-outline my-1">
                            <textarea name="meta_description"  rows="5"  class="form-control" >{{ $products->meta_description }}</textarea>

                        </div>
                    </div>



                    <div class="col-md-12">
                        <label class="form-label">Meta Keywords</label>

                        <div class="input-group input-group-outline my-1">
                            <textarea name="meta_keywords"  rows="5"  class="form-control">{{ $products->meta_keywords }}</textarea>

                        </div>
                    </div>

                    <div class="input-group input-group-outline my-3">
                        @if($products->image)
                            <img style="height: 100px;width: 80px" src="{{asset('admin/img/products/'.$products->image)}}">
                        @endif
                        <div class="col-md-12">
                                <input type="file" name="image" class="form-control">

                        </div>
                    </div>

                </div>
                </div>
                <button class="btn btn-success">Submit</button>
            </form>

        </div>

    </div>
@endsection

