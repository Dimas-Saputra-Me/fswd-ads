<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use App\Http\Requests\StoreemployeesRequest;
use App\Http\Requests\UpdateemployeesRequest;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource  (latest 3).
     */
    public function latest()
    {
        $employees = Employees::orderBy('tanggal_bergabung', 'desc')->paginate(3);

        return $employees;
    }

    /**
     * Display a listing of the resource  (all).
     */
    public function getEmployees()
    {
        $employees = Employees::orderBy('tanggal_bergabung', 'desc')->get();

        return $employees;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmployeesRequest $request)
    {
        // Create a new employee record
        Employees::create($request->all());

        // Redirect to a specific page or back to the form
        return redirect()->to('./employees')->with('create', 'Employee added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(employees $employees)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(employees $employees)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateemployeesRequest $request)
    {
        // Update the employee record with the new data
        $employee = Employees::where('nomor_induk', $request->nomor_induk)->first();
        $employee->update([
            'nomor_induk' => $request->nomor_induk,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'tanggal_lahir' => $request->tanggal_lahir,
            'tanggal_bergabung' => $request->tanggal_bergabung,
        ]);

        // Redirect to a specific page or back to the form
        return redirect()->to('/employees')->with('edit', 'Employee edited successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the employee record by ID
        $employee = Employees::findOrFail($id);

        // Delete the employee record
        $employee->delete();

        // Redirect to a specific page or back to the previous page
        return redirect()->to('/employees')->with('delete', 'Employee deleted successfully.');
    }
}
