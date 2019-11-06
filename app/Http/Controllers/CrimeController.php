<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Car;
use App\Models\Crime;
use Illuminate\Http\Request;

class CrimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'user_id'       =>  'required',
            'fine_amount'   => 'required',
            'car_owner_id'  => 'required',
            'car_id'        => 'required'
        ]);
        
        
        // $vehicle = Car::find($request->car_id);
        $account = Account::where('car_id',$request->car_id)->first();
        if (!$account) {
            return back()->with('danger','This MTP does not have an account created!');
        }
        $account->balance -= $request->fine_amount;
        $account->debt += $request->fine_amount;
        $account->save();

        Crime::create($request->all());

        return back()->with('success','Crime record operated successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Crime  $crime
     * @return \Illuminate\Http\Response
     */
    public function show(Crime $crime)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Crime  $crime
     * @return \Illuminate\Http\Response
     */
    public function edit(Crime $crime)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Crime  $crime
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Crime $crime)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Crime  $crime
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Crime::find($id);
        $item->delete();
        return back()->with('danger', 'Crime record deleted successfully!');
    }
}
