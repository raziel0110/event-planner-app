<?php

namespace App\Services;

use App\Exceptions\EmployeeException;
use App\Models\Employee;
use Illuminate\Http\Response;

class EmployeeService 
{
    public static function getEmployee($id)
    {
        $employee = Employee::find($id);

        if (!$employee) {
            throw new EmployeeException('Something went wrong while showing this employee.', Response::HTTP_NOT_FOUND);
        }

        return $employee;
    }
}