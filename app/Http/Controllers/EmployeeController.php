<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\EmployeeProfile;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $employees = Employee::all();

        return view('employees.index', [
            'employees' => $employees,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('employees.create');
    }


    /**
     * Display the specified resource.
     *
     * @return View
     */
    public function show(Employee $employee)
    {
        return view('employees.show', [
            'employee' => $employee,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return View
     */
    public function edit(Employee $employee)
    {
        return view('employees.edit', [
            'employee' => $employee,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return View
     */
    public function update(Request $request, Employee $employee, EmployeeProfile $employeeProfile)
    {
        $employee->update($this->validateEmployeeRequest());
        $employeeProfile->update($this->validateProfileRequest());

        return redirect($employee->path());
    }

    /**
     * Validate the request attributes.
     *
     * @return array
     */
    protected function validateEmployeeRequest()
    {
        return request()->validate([
            'first_name' => 'sometimes|required',
            'last_name' => 'sometimes|required',
            'email' => 'sometimes|required',
        ]);
    }

    /**
     * Validate the request attributes.
     *
     * @return array
     */
    protected function validateProfileRequest()
    {
        return request()->validate([
            'role' => 'sometimes|required',
            'address' => 'sometimes|required',
            'city' => 'sometimes|required',
            'county' => 'sometimes|required',
            'postcode' => 'sometimes|required',
            'country' => 'sometimes|required',
        ]);
    }
}
