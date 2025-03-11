<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        return view('employees.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'position' => 'required',
            'salary' => 'required|numeric',
        ]);

        Employee::create([
            'name' => $request->name,
            'position' => $request->position,
            'salary' => $request->salary,
        ]);

        return redirect()->route('tampilan.pegawai')->with('success', 'Pegawai berhasil ditambahkan');
        }

        public function edit($id)
        {
            $employee = Employee::findOrFail($id);
            return view('employees.edit', compact('employee'));
        }

        public function update(Request $request, $id)
        {
            $request->validate([
                'name' => 'required',
                'position' => 'required',
                'salary' => 'required|numeric',
            ]);

            $employee = Employee::findOrFail($id);
            $employee->update([
                'name' => $request->name,
                'position' => $request->position,
                'salary' => $request->salary,
            ]);

            return redirect()->route('tampilan.pegawai')->with('success', 'Pegawai berhasil diperbarui');
                }

                public function destroy($id)
                {
                    Employee::destroy($id);
                    return redirect()->route('tampilan.pegawai') >with('success', 'Pegawai berhasil dihapus');
                }
            }