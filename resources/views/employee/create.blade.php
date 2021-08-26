@extends('layout')

@section('title','Add Employees')

@section('header', 'Create New Employee')

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
        <form action="{{ url('employee') }}" method="post" enctype="multipart/form-data">
            @csrf
            <table class="table table-bordered"> 
                <tr>
                    <th>First Name</th>
                    <td><input type="text" name="first_name" class="form-control" value="{{ old('first_name') }}"></td>
                </tr>
                <tr>
                    <th>Last Name</th>
                    <td><input type="text" name="last_name" class="form-control" value="{{ old('last_name') }}"></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><input type="email" name="email" class="form-control" value="{{ old('email') }}"></td>
                </tr>
                <tr>
                    <th>Password</th>
                    <td><input type="password" name="password" class="form-control"></td>
                </tr>
                <tr>
                    <th>Department</th>
                    <td>
                        <select name="department" class="form-control">
                            <option value="">-- Select Department --</option>
                            @foreach($departments as $department)
                                <option value="{{ $department->id }}">{{ $department->title }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Designation</th>
                    <td>
                        <select name="designation" class="form-control">
                            <option value="">-- Select Designation --</option>
                            @foreach($designations as $designation)
                                <option value="{{ $designation->id }}">{{ $designation->title }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Photo</th>
                    <td><input type="file" name="photo" class="form-control"></td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td><input type="text" name="address" class="form-control" value="{{ old('address') }}"></td>
                </tr>
                <tr>
                    <th>Mobile</th>
                    <td><input type="text" name="mobile" class="form-control" value="{{ old('mobile') }}"></td>
                </tr>
                <tr>
                    <td colspan="2"><button type="submit" value="Submit" class="btn btn-primary">Save</button></td> 
                </tr>
            </table>
        </form>
    </div>
@endsection