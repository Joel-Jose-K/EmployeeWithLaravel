<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Department;
use App\Models\Designation;
use App\Models\Employee;

use App\Jobs\SendEmailJob;
use App\Http\Controllers\Controller;

use App\Repositories\EmployeeRepositoryInterface;

use DataTables;

use App\Exports\EmployeeExport;
use App\Imports\EmployeeImport;
use Maatwebsite\Excel\Facades\Excel;


class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $repository;

    public function __construct(EmployeeRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }


    public function index(Request $request)
    {
        if($request->ajax()){
            $data = Employee::select('id', 'first_name', 'last_name', 'email', 'password', 'department_id', 'designation_id', 'photo', 'address', 'mobile');
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('department', function($row){
                        return $row->department->title;
                    })
                    ->addIndexColumn()
                    ->addColumn('designation', function($row){
                        return $row->designation->title;
                    })
                    ->addColumn('photo', function($data){
                        $url = ('photos/'.$data->photo);
                        return '<img src="'.$url.'" width="80"/>';
                    })
                    ->addColumn('action', function($data){
                        return '<a href="employee/'.$data->id.'/edit" class="btn btn-success btn-sm">Update</a>
                        <a href="employee/'.$data->id.'/delete" class="btn btn-danger btn-sm">Delete</a> ';
                    })->rawColumns(['photo', 'action'])->make(true);
        }
        return view('employee.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Department::orderBy('id', 'desc')->get();
        $datades = Designation::orderBy('id', 'desc')->get();
        return view('employee.create', ['departments'=>$data, 'designations'=>$datades]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name'=>'required|max:100',
            'last_name'=>'required|max:100',
            'email'=>'required|unique:employees',
            'password'=>'required',
            'department'=>'required',
            'designation'=>'required',
            'photo'=>'nullable|image|mimes:jpeg,jpg,png|max:5120',
            'address'=>'nullable|max:150',
            'mobile'=>'required|unique:employees|numeric|digits_between:8,16'
        ]);

        $this->repository->store($request);

        return redirect('employee/create')->with('msg', 'New employee added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $departs = Department::orderBy('id', 'desc')->get();
        $designs = Designation::orderBy('id', 'desc')->get();
        $data = Employee::find($id);
        return view('employee.edit', ['departs'=>$departs, 'designs'=>$designs, 'data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name'=>'required|max:100',
            'last_name'=>'required|max:100',
            'email'=>'required',
            'password'=>'required',
            'department'=>'required',
            'designation'=>'required',
            'photo'=>'nullable|image|mimes:jpeg,jpg,png|max:5120',
            'address'=>'nullable|max:150',
            'mobile'=>'required|numeric|digits_between:8,16'
        ]);

        $this->repository->update($request, $id);        

        return redirect('employee')->with('msg', 'Employee data updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->repository->destroy($id);

        return redirect('employee')->with('msg', 'The data was deleted successfully.');
    }

    public function export()
    {
        return Excel::download(new EmployeeExport, 'employees.xlsx');
    }

    public function importForm()
    {
        return view('excel.import-form');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xls,xlsx'
        ]);

        Excel::import(new EmployeeImport, $request->file);
        return redirect('import-form')->with('msg', 'Upload successful!');
    }
}
