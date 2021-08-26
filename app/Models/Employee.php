<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    function department(){
        return $this->belongsTo(Department::class);
    }

    function designation(){
        return $this->belongsTo(Designation::class);
    }

    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'department_id', 'designation_id', 'photo', 'address', 'mobile'
    ];
}
