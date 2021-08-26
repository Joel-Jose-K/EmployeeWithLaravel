@extends('layout')

@section('title','Update Department')

@section('header', 'Update Department')

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
        <form action="{{ url('depart/'.$data->id) }}" method="post">
            @method('put')
            @csrf
            <table class="table table-bordered"> 
                <tr>
                    <th>Title</th>
                    <td><input type="text" value="{{ $data->title }}" name="title" class="form-control"></td>
                </tr>
                <tr>
                    <td colspan="2"><button type="submit" value="Submit" class="btn btn-success">Update</button></td> 
                </tr>
            </table>
        </form>
    </div>
@endsection