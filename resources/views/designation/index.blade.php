@extends('layout')

@section('title', 'Designations')

@section('header', 'Designation List')

@section('content')
    <!-- Department List -->
    <a href="{{ url('designation/create') }}" class="btn btn-primary" >Add New</a>
    <div class="card-body">
        @if(Session::has('msg'))
            <p class="alert alert-success">{{ session('msg') }}</p>
        @endif
        <table id="example2" class="table table-bordered table-hover">
            <thead>
            <tr>
            <th>#</th>
            <th>Title</th>
            <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @if($data)
                @foreach($data as $d)
                <tr>
                    <td>{{ $d->id }}</td>
                    <td>{{ $d->title }}</td>
                    <td>
                        <a href="{{ url('designation/'.$d->id.'/edit') }}" class="btn btn-success btn-sm">Update</a>
                        <a onclick="return confirm('Are you sure you want to delete this data?')" href="{{ url('designation/'.$d->id.'/delete') }}" class="btn btn-danger btn-sm">Delete</a>
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