<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\CarOwner;
use App\Models\Company;
use App\Models\Car;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accounts = Account::latest()->paginate();
        return view('system.accounts.index',compact(['accounts']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $accounts   = Account::latest()->paginate();
        $owners     = CarOwner::all();
        $companies  = Company::all();
        $vehicles   = Car::all();
        return view('system.accounts.create',compact(['accounts','companies','owners','vehicles']));
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
            'balance'      =>  '',
            'user_id'           =>  'required',
            'drivers_number'    => 'required',
            'status'            =>  'required'
        ]);
        Account::create($request->all());

        return redirect()->route('companies.index')->with('success','Insurance company added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $accounts = Account::all();
        $account = Account::find($id);
        if (!$account) {
            return back()->with('danger','Sorry, the car account does not exist');
        }
        return view('system.accounts.show',compact(['accounts']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $accounts = Account::all();
        $account = Account::find($id);
        if (!$account) {
            return back()->with('danger','Sorry, the car account does not exist');
        }
        return view('system.accounts.show',compact(['accounts']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Account::find($id);
        $item->delete();
        return redirect()->route('accounts.index')->with('danger', 'Vehicle owner account deleted successfully!');
    }
}
