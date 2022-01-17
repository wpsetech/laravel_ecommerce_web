
@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Registered Users</h4>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-responsive-sm">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Action</th>

                </tr>
                </thead>
                <tbody>
                @foreach($users as $item)
                    <tr>
                        <th>{{ $item->id }}</th>
                        <td>{{$item->name.''.$item->lastname}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->phone}}</td>
                        <td>
                            <a href="{{url('view-user/'.$item->id)}} "><button class="btn btn-sm btn-primary">View</button></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>

        </div>

    </div>
@endsection


