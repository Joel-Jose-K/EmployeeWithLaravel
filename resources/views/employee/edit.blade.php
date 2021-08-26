@extends('layout')

@section('title','Update Employees')

@section('header', 'Update Current Employee')

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
        <form action="{{ url('employee/'.$data->id) }}" method="post" enctype="multipart/form-data">
            @method('put')
            @csrf
            <table class="table table-bordered"> 
                <tr>
                    <th>First Name</th>
                    <td><input type="text" value="{{ $data->first_name }}" name="first_name" class="form-control"></td>
                </tr>
                <tr>
                    <th>Last Name</th>
                    <td><input type="text" value="{{ $data->last_name }}" name="last_name" class="form-control"></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><input type="email" value="{{ $data->email }}" name="email" class="form-control"></td>
                </tr>
                <tr>
                    <th>Password</th>
                    <td><input type="password" value="" name="password" class="form-control"></td>
                </tr>
                <tr>
                    <th>Department</th>
                    <td>
                        <select name="department" class="form-control">
                            <option value="">-- Select Department --</option>
                            @foreach($departs as $depart)
                                <option @if($depart->id == $data->department_id) selected @endif value="{{ $depart->id }}">{{ $depart->title }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Designation</th>
                    <td>
                        <select name="designation" class="form-control">
                            <option value="">-- Select Designation --</option>
                            @foreach($designs as $design)
                                <option @if($design->id == $data->designation_id) selected @endif value="{{ $design->id }}">{{ $design->title }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Photo</th>
                    <td><input type="file" name="photo" class="form-control">
                    <p>
                        <img src="{{ asset('photos/'.$data->photo) }}" alt="user photo" width="200">
                        <input type="hidden" name="prev_photo" value="{{ $data->photo }}">
                    </p>
                    </td>    
                </tr>
                <tr>
                    <th>Address</th>
                    <td><input type="text" value="{{ $data->address }}" name="address" class="form-control"></td>
                </tr>
                <tr>
                    <th>Mobile</th>
                    <td><input type="text" value="{{ $data->mobile }}" name="mobile" class="form-control"></td>
                </tr>
                <tr>
                    <td colspan="2"><button type="submit" value="Submit" class="btn btn-success">Update</button></td> 
                </tr>
            </table>
        </form>
    </div>
@endsection