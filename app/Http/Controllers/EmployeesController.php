<?php

namespace App\Http\Controllers;

use App\Exceptions\EmployeeException;
use App\Models\Employee;
use App\Services\EmployeeService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(['employees' => Employee::all()], Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'name'     => 'required|string|min:5',
                'email'    => 'required|email',
                'phone'    => 'required|min:10',
                'type'     => ['required', Rule::in(Employee::TYPES)],
                'event_id' => 'required|numeric'
            ]);
    
            $employee = Employee::create([
                'name'     => $request->input('name'),
                'email'    => $request->input('email'),
                'phone'    => $request->input('phone'),
                'type'     => $request->input('type'),
                'event_id' => $request->input('event_id')
            ]);

            return response()->json(['employee' => $employee], Response::HTTP_CREATED);
        } catch (EmployeeException $e) {
            return $e;
        }
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            return response()->json(['employee' => EmployeeService::getEmployee($id)]);
        } catch (EmployeeException $e) {
            return $e;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
