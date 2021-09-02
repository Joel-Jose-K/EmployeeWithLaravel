<?php

namespace App\Imports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\ToModel;

class EmployeeImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Employee([
            'id' => $row[0],
            'first_name' => $row[1],
            'last_name' => $row[2],
            'email' => $row[3],
            'password' => $row[4],
            'department_id' => rand(1,2),
            'designation_id' => rand(1,2),
            'photo' => $row[7],
            'mobile' => $row[8],
        ]);
    }
}
