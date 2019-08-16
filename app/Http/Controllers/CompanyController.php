<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::latest()->paginate();
        return view('system.companies.index', compact(['companies']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::latest()->paginate();
        return view('system.companies.create', compact(['companies']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'company_name'      =>  'required|unique:companies',
            'user_id'           =>  'required',
            'drivers_number'    => 'required',
            'status'            =>  'required'
        ]);
        Company::create($request->all());

        return redirect()->route('companies.index')->with('success','Insurance company added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = Company::find($id);
        if (!$company) {
            return back()->with('danger', 'Oups, Company not found!');
        }
        $companies = Company::latest()->paginate();
        return view('system.companies.show', compact(['companies','company']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::find($id);
        if (!$company) {
            return back()->with('danger', 'Oups, Company not found!');
        }
        $companies = Company::latest()->paginate();
        return view('system.companies.edit', compact(['companies','company']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'company_name'      =>  'required',
            'user_id'           =>  'required',
            'drivers_number'    => 'required',
            'status'            =>  'required'
        ]);
        Company::find($id)->update($request->all());

        return redirect()->route('companies.index')->with('success','Company updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
