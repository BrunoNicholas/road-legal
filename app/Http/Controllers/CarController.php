<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Company;
use App\Models\CarOwner;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicles = Car::latest()->paginate();
        return view('system.vehicles.index',compact(['vehicles']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vehicles = Car::latest()->paginate();
        $companies = Company::all();
        $owners = CarOwner::all();
        return view('system.vehicles.create',compact(['vehicles','owners','companies']));
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
            'reg_no'    =>  'required',
            'no_plate' => 'required|unique:cars'
        ]);
        Car::create($request->all());

        return redirect()->route('vehicles.index')->with('success','MTP car/vehicle added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vehicles = Car::all();
        $vehicle = Car::find($id);
        if (!$vehicle) {
            return redirect()->route('vehicles.index')->with('danger', 'The specified vehicle does not exist!');
        }
        return view('system.vehicles.show',compact(['vehicles','vehicle']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vehicles = Car::all();
        $vehicle = Car::find($id);
        $companies = Company::all();
        $owners = CarOwner::all();
        if (!$vehicle) {
            return redirect()->route('vehicles.index')->with('danger', 'The specified vehicle does not exist!');
        }
        return view('system.vehicles.edit',compact(['vehicles','companies','vehicle','owners']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'reg_no'    =>  'required',
            'no_plate' => 'required'
        ]);

        Car::find($id)->update($request->all());
        return redirect()->route('vehicles.index')->with('success','MTP record updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Car::find($id);
        $item->delete();
        return redirect()->route('vehicles.index')->with('danger', 'Car details deleted successfully!');
    }
}
