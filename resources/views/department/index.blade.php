@extends('layout')

@section('title', 'Departments')

@section('header', 'Department List')

@section('content')
    <!-- Department List -->
    <a href="{{ url('depart/create') }}" class="btn btn-primary" >Add New</a>
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
                        <a href="{{ url('depart/'.$d->id.'/edit') }}" class="btn btn-success btn-sm">Update</a>
                        <a onclick="return confirm('Are you sure you want to delete this data?')" href="{{ url('depart/'.$d->id.'/delete') }}" class="btn btn-danger btn-sm">Delete</a>
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


<!-- jQuery -->
<!-- <script src="../../plugins/jquery/jquery.min.js"></script> -->
<!-- Bootstrap 4 -->
<!-- <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script> -->
<!-- DataTables  & Plugins -->
<!-- <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../plugins/jszip/jszip.min.js"></script>
<script src="../../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script> -->
<!-- AdminLTE App -->
<!-- <script src="../../dist/js/adminlte.min.js"></script> -->
<!-- AdminLTE for demo purposes -->
<!-- <script src="../../dist/js/demo.js"></script> -->

@endsection