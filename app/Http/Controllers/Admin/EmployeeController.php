<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index()
    {
        $employees = Employee::latest()->paginate(10);
        return view('admin.employees.index', compact('employees'));
    }

    public function create()
    {
        return view('admin.employees.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required',
            'email' => 'required|email|unique:employees',
            'role'  => 'required',
        ]);

        Employee::create($request->all());
        return redirect()->route('admin.employees.index')->with('success', 'Karyawan berhasil ditambahkan');
    }

    public function edit(Employee $employee)
    {
        return view('admin.employees.edit', compact('employee'));
    }

    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'name'  => 'required',
            'email' => 'required|email|unique:employees,email,'.$employee->id,
            'role'  => 'required',
        ]);

        $employee->update($request->all());
        return redirect()->route('admin.employees.index')->with('success', 'Karyawan berhasil diperbarui');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('admin.employees.index')->with('success', 'Karyawan berhasil dihapus');
    }
}
