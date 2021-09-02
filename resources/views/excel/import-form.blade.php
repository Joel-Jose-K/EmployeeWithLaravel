@extends('layout')

@section('title', 'Upload Excel Data')

@section('header', 'Upload Excel Data')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-body">
                    @if($errors->any())
                        @foreach($errors->all() as $error)
                            <p class="alert alert-warning">{{ $error }}</p>
                        @endforeach
                    @endif

                    @if(Session::has('msg'))
                    <p class="alert alert-success">{{ session('msg') }}</p>
                    @endif
                    <form method="POST" action="{{ route('employee.import') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="file">Choose an Excel file.</label>
                            <input type="file" name="file" id="file" class="form-control">
                        </div>
                        <div>
                            <button type="submit" value="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection