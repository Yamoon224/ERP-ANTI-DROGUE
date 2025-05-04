<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EmployeeController extends Controller
{
    // Liste des employés (y compris option de filtrage)
    public function index()
    {
        $employees = Employee::all();
        return view('employees.index', compact('employees'));
    }

    // Création d'un employé
    public function store(Request $request)
    {
        $data = $request->validate([
            'firstname' => 'required|string|max:100',
            'lastname' => 'required|string|max:100',
            'email' => 'nullable|email|unique:employees,email',
            'phone' => 'nullable|string|max:20',
            'role' => 'required|string',
            'grade' => 'nullable|string',
            'employee_type' => ['required', Rule::in(['officer', 'civil_agent'])],
            'status' => ['nullable', Rule::in(['active', 'sick', 'retired', 'on_leave', 'in_training', 'dismissed'])],
            'hire_date' => 'required|date',
        ]);

        $employee = Employee::create($data);

        return back()->with(['message'=>__('locale.save')]);
    }

    // Affichage d'un seul employé
    public function show($id)
    {
        $employee = Employee::find($id);
        return view('employee', compact('employee'));
    }

    // Mise à jour d'un employé
    public function update(Request $request, $id)
    {
        $employee = Employee::find($id);

        $data = $request->validate([
            'firstname' => 'sometimes|required|string|max:100',
            'lastname' => 'sometimes|required|string|max:100',
            'email' => ['sometimes', 'required', 'email', Rule::unique('employees')->ignore($employee->id)],
            'phone' => 'nullable|string|max:20',
            'employee_type' => ['sometimes', 'required', Rule::in(['officer', 'civil_agent'])],
            'status' => ['nullable', Rule::in(['active', 'sick', 'retired', 'on_leave', 'in_training', 'dismissed'])],
            'hire_date' => 'sometimes|required|date',
        ]);

        $employee->update($data);

        return redirect()->route('employees.index')->with(['message'=>__('locale.save')]);
    }

    // Suppression (soft delete) d'un employé
    public function destroy($id)
    {
        $employee = Employee::find($id);
        $employee->delete();

        return back()->with(['message'=>__('locale.save')]);
    }
}
