@extends('layout')

@section('title', 'Employees')

@section('header', 'Employees List')

@section('content')
    <!-- Employees List -->
    <a href="{{ url('employee/create') }}" class="btn btn-primary" >Add New</a>
    <div class="card-body">
        @if(Session::has('msg'))
            <p class="alert alert-success">{{ session('msg') }}</p>
        @endif
        <table id="example2" class="table table-bordered table-hover">
            <thead>
            <tr>
            <th>#</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Department</th>
            <th>Designation</th>
            <th>Photo</th>
            <th>Address</th>
            <th>Mobile</th>
            <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @if($data)
                @foreach($data as $d)
                <tr>
                    <td>{{ $d->id }}</td>
                    <td>{{ $d->first_name }}</td>
                    <td>{{ $d->last_name }}</td>
                    <td>{{ $d->email }}</td>
                    <td>{{ $d->password }}</td>
                    <td>{{ $d->department->title }}</td>
                    <td>{{ $d->designation->title }}</td>
                    <td><img src="{{ asset('photos/'.$d->photo) }}" alt="user photo" width="80"></td>
                    <td>{{ $d->address }}</td>
                    <td>{{ $d->mobile }}</td>
                    <td>
                        <a href="{{ url('employee/'.$d->id.'/edit') }}" class="btn btn-success btn-sm">Update</a>
                        <a onclick="return confirm('Are you sure you want to delete this data?')" href="{{ url('employee/'.$d->id.'/delete') }}" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
                @endforeach
            @endif
            </tbody>
            <!-- <tfoot>
            <tr>
            <th>#</th>
            <th>Title</th>
            </tr>
            </tfoot> -->
        </table>
    </div>

@endsection