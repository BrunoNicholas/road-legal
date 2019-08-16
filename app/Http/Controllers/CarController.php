<?php

namespace App\Http\Controllers;

use App\Models\Car;
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
        return view('system.vehicles.create',compact(['vehicles']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        return view('system.vehicles.show',compact(['vehicles']));
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
        if (!$vehicle) {
            return redirect()->route('vehicles.index')->with('danger', 'The specified vehicle does not exist!');
        }
        return view('system.vehicles.edit',compact(['vehicles']));
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
        //
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
        return redirect()->route('vehicles.index')->with('danger', 'Car detailes deleted successfully!');
    }
}
