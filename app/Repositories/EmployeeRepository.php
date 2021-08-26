<?php

namespace App\Repositories;

use App\Jobs\SendEmailJob;

use App\Models\Employee;

class EmployeeRepository implements EmployeeRepositoryInterface
{
    public function store($request){

        if($request->hasFile('photo')){
            $photo = $request->file('photo');
            $renamePhoto = time().'.'.$photo->getClientOriginalExtension();
            $destination = public_path('/photos');
            $photo->move($destination, $renamePhoto);
        }   else{
            $renamePhoto = "No Image";
        }

        $data = new Employee;
        $data->first_name = $request->first_name;
        $data->last_name = $request->last_name;
        $data->email = $request->email;
        $data->password = $request->password;
        $data->department_id = $request->department;
        $data->designation_id = $request->designation;
        $data->photo = $renamePhoto;
        $data->address = $request->address;
        $data->mobile = $request->mobile;
        $data->save();

        $details['email'] = $data->email;
        SendEmailJob::dispatch($details);
        // dispatch(new \App\Jobs\SendEmailJob($details));
        // dd('Send Email Successfully');
    }

    public function update($request, $id){

        if($request->hasFile('photo')){
            $photo = $request->file('photo');
            $renamePhoto = time().'.'.$photo->getClientOriginalExtension();
            $destination = public_path('/photos');
            $photo->move($destination, $renamePhoto);
        }   else{
            $renamePhoto = $request->prev_photo;
        }

        $data = Employee::find($id);
        $data->first_name = $request->first_name;
        $data->last_name = $request->last_name;
        $data->email = $request->email;
        $data->password = $request->password;
        $data->department_id = $request->department;
        $data->designation_id = $request->designation;
        $data->photo = $renamePhoto;
        $data->address = $request->address;
        $data->mobile = $request->mobile;
        $data->save();
    }

    public function destroy($id){
        
        Employee::where('id', $id)->delete();
    }
}