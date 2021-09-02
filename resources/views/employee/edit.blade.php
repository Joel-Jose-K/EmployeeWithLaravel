@extends('layout')

@section('title','Update Employees')

@section('header', 'Update Current Employee')

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
        <form action="{{ url('employee/'.$data->id) }}" method="post" enctype="multipart/form-data" id="editForm">
            @method('put')
            @csrf
            <div class="">
                <div class="form-group col-md-6  offset-md-3">
                    <label>First Name <span class="text-danger">*</span></label>
                    <input type="text" value="{{ $data->first_name }}" name="first_name" class="form-control">
                </div>
                <div class="form-group col-md-6 offset-md-3">
                    <label>Last Name <span class="text-danger">*</span></label>
                    <input type="text" value="{{ $data->last_name }}" name="last_name" class="form-control">
                </div>
                <div class="form-group col-md-6 offset-md-3">
                    <label>Email <span class="text-danger">*</span></label>
                    <input type="email" value="{{ $data->email }}" name="email" class="form-control">
                </div>
                <div class="form-group col-md-6 offset-md-3">
                    <label>Password <span class="text-danger">*</span></label>
                    <input type="password" value="" name="password" class="form-control">
                </div>
                <div class="form-group col-md-6 offset-md-3">
                    <label>Department <span class="text-danger">*</span></label>
                    <select name="department" class="form-control">
                        <option value="">-- Select Department --</option>
                        @foreach($departs as $depart)
                            <option @if($depart->id == $data->department_id) selected @endif value="{{ $depart->id }}">{{ $depart->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6 offset-md-3">
                    <label>Designation <span class="text-danger">*</span></label>
                    <select name="designation" class="form-control">
                        <option value="">-- Select Designation --</option>
                        @foreach($designs as $design)
                            <option @if($design->id == $data->designation_id) selected @endif value="{{ $design->id }}">{{ $design->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6 offset-md-3">
                    <label>Photo</label>
                    <input type="file" name="photo" class="form-control">
                    <p>
                        <img src="{{ asset('photos/'.$data->photo) }}" alt="user photo" width="200">
                        <input type="hidden" name="prev_photo" value="{{ $data->photo }}">
                    </p>
                </div>
                <div class="form-group col-md-6 offset-md-3">
                    <label>Address</label>
                    <input type="text" value="{{ $data->address }}" name="address" class="form-control">
                </div>
                <div class="form-group col-md-6 offset-md-3">
                    <label>Mobile <span class="text-danger">*</span></label>
                    <input type="text" value="{{ $data->mobile }}" name="mobile" class="form-control">
                </div>
                <div class="form-group col-md-6 offset-md-3"> 
                    <button type="submit" value="Submit" class="btn btn-success">Update</button>
                </div>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>

    <script>
        $(document).ready(function () {

            $.noConflict();

            $('#editForm').validate({
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