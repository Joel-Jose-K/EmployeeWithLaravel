@extends('layout')

@section('title', 'Employees')

@section('header', 'Employees List')

@section('content')

<a href="{{ url('employee/create') }}" class="btn btn-primary" >Add New</a>

<a href="{{ url('employee/export') }}" class="btn btn-primary">Export</a>

<a href="{{ url('import-form') }}" class="btn btn-primary">Import</a>

    <div class="card-body">
        @if(Session::has('msg'))
            <p class="alert alert-success">{{ session('msg') }}</p>
        @endif
        <table id="myTable" class="table table-bordered table-hover">
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
            <tbody></tbody>
        </table>
    </div>

<script src="https://code.jquery.com/jquery-3.6.0.js"></script>

<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready( function () {

        $.noConflict();

        $('#myTable').DataTable({
            processing:true,
            serverSide:true,
            ajax:'{{ route("employee.index") }}',
            'columns':[
                {data:'id', name:'id'},
                {data:'first_name', name:'first_name'},
                {data:'last_name', name:'last_name'},
                {data:'email', name:'email'},
                {data:'password', name:'password'},
                {data:'department', name:'department'},
                {data:'designation', name:'designation'},
                {data:'photo', name:'photo'},
                {data:'address', name:'address'},
                {data:'mobile', name:'mobile'},
                {data:'action', name:'action', orderable:false, searchable:false},
            ]
        });
    } );
</script>

@endsection