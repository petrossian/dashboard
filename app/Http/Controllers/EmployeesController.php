<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = DB::table('employees')
        ->join('employee_company', 'employees.id', '=', 'employee_company.employee_id')
        ->join('companies', 'companies.id', '=', 'employee_company.company_id')
        ->get();
        return view('employees', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = DB::table('companies')->join('logos', 'logos.company_id', '=', 'companies.id')->get();
        return view('employeescreate', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email',
            'phone' => 'required',
            'company_id' => 'required',
        ]);
        if($validated){
            $id = DB::table('employees')->insertGetId([
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
            ], true);
            if($id){
                DB::table('employee_company')->insert([
                    'employee_id' => $id,
                    'company_id' => $request->input('company_id'),
                ], true);
                return back();
            }
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
        $employee = DB::table('employees')
        ->join('employee_company', 'employees.id', '=', 'employee_company.employee_id')
        ->join('companies', 'companies.id', '=', 'employee_company.company_id')
        ->join('logos', 'logos.company_id', '=', 'companies.id')
        ->first();
        return view('employeeshow', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = DB::table('employees')
        ->join('employee_company', 'employees.id', '=', 'employee_company.employee_id')
        ->join('companies', 'companies.id', '=', 'employee_company.company_id')
        ->join('logos', 'logos.company_id', '=', 'companies.id')
        ->select('employees.id', 'employees.first_name','employees.last_name','employees.email','employees.phone','logos.file', 'companies.name')
        ->first();
        return view('employeesedit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $employee = DB::table('employees')
        ->join('employee_company', 'employees.id', '=', 'employee_company.employee_id')
        ->join('companies', 'companies.id', '=', 'employee_company.company_id')
        ->join('logos', 'logos.company_id', '=', 'companies.id')
        ->select('employees.id', 'employees.first_name','employees.last_name','employees.email','employees.phone','logos.file', 'companies.name')
        ->first();
        DB::table('employees')->where('id', $id)->update([
            'first_name'=> $request->input('first_name') != null ? $request->input('first_name') : $employee->first_name,
            'last_name'=> $request->input('last_name') != null ? $request->input('last_name') : $employee->last_name,
            'phone'=> $request->input('phone') != null ? $request->input('phone') : $employee->phone,
            'email'=> $request->input('email') != null ? $request->input('email') : $employee->email
        ]);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('employees')->where('id', $id)->delete();
        return redirect("/employees");
    }
}
