@extends('layout')

@section('title','Add Designation')

@section('header', 'Create New Designation')

@section('content')
    <div class="card body">
        @if($errors->any())
            @foreach($errors->all() as $error)
                <p class="alert alert-warning">{{ $error }}</p>
            @endforeach
        @endif

        @if(Session::has('msg'))
            <p class="alert alert-success">{{ session('msg') }}</p>
        @endif
        <form action="{{ url('designation') }}" method="post">
            @csrf
            <table class="table table-bordered"> 
                <tr>
                    <th>Title</th>
                    <td><input type="text" name="title" class="form-control"></td>
                </tr>
                <tr>
                    <td colspan="2"><button type="submit" value="Submit" class="btn btn-primary">Save</button></td> 
                </tr>
            </table>
        </form>
    </div>
@endsection