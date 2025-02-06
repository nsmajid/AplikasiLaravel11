<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Division;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::filters([
            'search' => request('search'),
            'division' => request('division')
        ])
            ->with(['user', 'division']);

        // return $employees;
        // dd($employees);
        return view('employee.index', [
            'employees' => $employees->paginate(2)->withQueryString(),
            'divisions' => Division::oldest('division')->get()
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employee.create', ['divisions' => Division::oldest('division')->get()]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $validated = $request->validate([
            'email' => 'email|required|unique:users',
            'name' => 'required',
            'employee_code' => 'required|unique:employees',
            'whatsapp_number' => 'required',
            'address' => 'required',
            'pos_code' => 'required|digits:5',
            'division_id' => 'required',
        ]);

        $user =   User::create([
            'email' => $validated['email'],
            'password' => Hash::make('password')
        ]);

        if (!$user) {
            return redirect('/employee')->with('error', 'Failed create New Employee');
        }
        //hapus email dari arry
        unset($validated['email']);
        //penambahan array user_id
        $validated['user_id'] = $user->id;
        $employee = Employee::create($validated);

        if ($employee) {
            return redirect('/employee')->with('success', 'New Employee has been added');
        } else {


            return redirect('/employee')->with('error', 'Failed create New Employee');
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Employee $employee) {}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        return view('employee.edit', ['divisions' => Division::oldest('division')->get(), 'employee' => $employee]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {

        $dataValidation = [
            'name' => 'required',
            'whatsapp_number' => 'required',
            'address' => 'required',
            'pos_code' => 'required|digits:5',
            'division_id' => 'required'
        ];


        if ($employee->employee_code != $request->employee_code) {
            $dataValidation['employee_code'] = 'required|unique:employees';
        }
        if ($employee->user->email != $request->email) {
            $dataValidation['email'] = 'required|unique:users|email';
        }


        $validated = $request->validate($dataValidation);


        if ($employee->user->email != $request->email) {
            $updateUser =   User::where('id', $employee->user_id)->update(['email' => $validated['email']]);
            if (!$updateUser) {
                return redirect('/employee')->with('error', 'Failed update Data');
            }
        }

        unset($validated['email']);


        $updateEmployee =  Employee::where('id', $employee->id)->update($validated);


        if ($updateEmployee) {
            return redirect('/employee')->with('success', 'Data Employee has been updated');
        } else {


            return redirect('/employee')->with('error', 'Failed update data');
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        if (Employee::destroy($employee->id) && User::destroy($employee->user_id)) {
            return redirect('/employee')->with('success', 'Data Employee has been deleted');
        } else {
            return redirect('/employee')->with('error', 'Failed delete data');
        }
    }
}
