<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = DB::table('companies')->leftJoin('logos', 'logos.company_id', '=', 'companies.id')
        ->select('companies.id','companies.name', 'companies.email','companies.website','logos.file')
        ->paginate(10);
        return view('companies', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companiescreate');
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
            'name' => 'required|max:255',
            'email' => 'required|email',
            'website' => 'required',
            'file' => 'required',
        ]);
        if($validated){
            if($request->file->move(resource_path('logos'), $request->file->getClientOriginalName())){
                $id = DB::table('companies')->insertGetId([
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'website' => $request->input('website'),
                ], true);
                if($id){
                    DB::table('logos')->insert([
                        'company_id' => $id,
                        'file' => $request->file->getClientOriginalName(),
                    ], true);
                    return back();
                }
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
        $company = DB::table('companies')
        ->leftJoin('logos', 'logos.company_id', '=', 'companies.id')
        ->where('companies.id', '=', $id)
        ->select('companies.id','companies.name', 'companies.email','companies.website','logos.file')
        ->first();
        return view('companiesshow', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = DB::table('companies')
        ->leftJoin('logos', 'logos.company_id', '=', 'companies.id')
        ->where('companies.id', '=', $id)
        ->select('companies.id','companies.name', 'companies.email','companies.website','logos.file')
        ->first();
        return view('companiesedit', compact('company'));
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
        $company = DB::table('companies')
        ->leftJoin('logos', 'logos.company_id', '=', 'companies.id')
        ->where('companies.id', '=', $id)
        ->select('companies.id','companies.name', 'companies.email','companies.website','logos.file')
        ->first();
        DB::table('companies')->where('id', $id)->update([
            'name'=> $request->input('name') != null ? $request->input('name') : $company->name,
            'website'=> $request->input('website') != null ? $request->input('website') : $company->website,
            'email'=> $request->input('email') != null ? $request->input('email') : $company->email
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
        DB::table('companies')->where('id', $id)->delete();
        return redirect("/companies");
    }
}
