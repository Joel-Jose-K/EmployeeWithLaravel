<?php

namespace App\Exports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EmployeeExport implements FromCollection, ShouldAutoSize, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Employee::with('department')->get();
        // return Employee::all();
    }

    public function map($employee):array
    {
        return[
            $employee->id,
            $employee->first_name,
            $employee->last_name,
            $employee->email,
            $employee->department->title,
            $employee->designation->title,
            $employee->photo,
            $employee->address,
            $employee->mobile,
            $employee->created_at,
        ];
    }

    public function headings():array
    {
        return[
            '#',
            'First Name',
            'Second Name',
            'Email',
            'Department',
            'Designation',
            'Photo',
            'Address',
            'Mobile',
            'created_at',
        ];
    }
}
