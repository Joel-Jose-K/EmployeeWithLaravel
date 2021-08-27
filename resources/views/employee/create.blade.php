@extends('layout')

@section('title','Add Employees')

@section('header', 'Create New Employee')

@section('content')
<style>
    label.error {
         color: #dc3545;
         font-size: 14px;
    }
</style>

    <div class="card body">
        @if($errors->any())
            @foreach($errors->all() as $error)
                <p class="alert alert-warning">{{ $error }}</p>
            @endforeach
        @endif

        @if(Session::has('msg'))
            <p class="alert alert-success">{{ session('msg') }}</p>
        @endif
        <form action="{{ url('employee') }}" method="post" enctype="multipart/form-data" id="createForm">
            @csrf
            <div class="">
                <div class="form-group col-md-6">
                    <label>First Name <span class="text-danger">*</span></label>
                    <input type="text" name="first_name" class="form-control" value="{{ old('first_name') }}">
                </div>
                <div class="form-group col-md-6">
                    <label>Last Name <span class="text-danger">*</span></label>
                    <input type="text" name="last_name" class="form-control" value="{{ old('last_name') }}">
                </div>
                <div class="form-group col-md-6">
                    <label>Email <span class="text-danger">*</span></label>
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                </div>
                <div class="form-group col-md-6">
                    <label>Password <span class="text-danger">*</span></label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <label>Department <span class="text-danger">*</span></label>
                    <select name="department" class="form-control">
                        <option value="">-- Select Department --</option>
                        @foreach($departments as $department)
                            <option value="{{ $department->id }}">{{ $department->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label>Designation <span class="text-danger">*</span></label>
                    <select name="designation" class="form-control">
                        <option value="">-- Select Designation --</option>
                        @foreach($designations as $designation)
                            <option value="{{ $designation->id }}">{{ $designation->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label>Photo</label>
                    <input type="file" name="photo" class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <label>Address</label>
                    <input type="text" name="address" class="form-control" value="{{ old('address') }}">
                </div>
                <div class="form-group col-md-6">
                    <label>Mobile <span class="text-danger">*</span></label>
                    <input type="text" name="mobile" class="form-control" value="{{ old('mobile') }}">
                </div>
                <div class="form-group col-md-6">
                    <button type="submit" value="Submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>

    <script>
        $(document).ready(function () {

            $.noConflict();

            $('#createForm').validate({
                rules: {
                    first_name: {
                        required: true,
                        maxlength: 100
                    },
                    last_name: {
                        required: true,
                        maxlength: 100
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true
                    },
                    department: {
                        required: true
                    },
                    designation: {
                        required: true
                    },
                    mobile: {
                        required: true,
                        minlength: 8,
                        maxlength: 16,
                        number: true
                    }
                },
                messages: {
                    first_name: {
                        required: "First name is required!",
                        maxlength: "First name cannot be more than 100 characters"
                    },
                    last_name: {
                        required: "Last name is required!",
                        maxlength: "Last name cannot be more than 100 characters"
                    },
                    email: {
                        required: "Email is required"
                    },
                    password: {
                        required: "Password is required"
                    },
                    department: {
                        required: "Department is required"
                    },
                    designation: {
                        required: "Designation is required"
                    },
                    mobile: {
                        required: "Mobile number is required",
                        maxlength: "Please enter a valid Mobile number"
                    }

                }
            });
        });
    </script>

@endsection