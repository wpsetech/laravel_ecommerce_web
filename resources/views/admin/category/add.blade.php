@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Add Category</h4>
        </div>
        <div class="card-body">

            <form action="{{route('insert.category')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">Name</label>
                        <div class="input-group input-group-outline my-1">

                            <input type="text" class="form-control" name="name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Slug</label>

                        <div class="input-group input-group-outline my-1">
                            <input type="text" class="form-control" name="slug">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">Description</label>

                        <div class="input-group input-group-outline my-1">
                            <textarea name="description" rows="5"  class="form-control"></textarea>

                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="" >Status</label>

                        <div class="input-group input-group-outline my-1">
                            <input type="checkbox"  name="status">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="" >Popular</label>

                        <div class="input-group input-group-outline my-1">
                            <input type="checkbox"  name="popular">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <label class="form-label">Meta Title</label>

                        <div class="input-group input-group-outline my-1">
                            <input type="text" class="form-control" name="meta_title">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <label class="form-label">Meta Description</label>

                        <div class="input-group input-group-outline my-1">
                            <textarea name="meta_descrip" rows="5"  class="form-control"></textarea>

                        </div>
                    </div>



                    <div class="col-md-12">
                        <label class="form-label">Meta Keywords</label>

                        <div class="input-group input-group-outline my-1">
                            <textarea name="meta_keywords" rows="5"  class="form-control"></textarea>

                        </div>
                    </div>

                    <div class="input-group input-group-outline my-3">
                        <div class="col-md-12">
                            <input type="file" name="image" class="form-control">
                        </div>
                    </div>

                </div>

                <button class="btn btn-success">Submit</button>
            </form>


        </div>
    </div>

@endsection
