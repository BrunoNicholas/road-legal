<?php

namespace App\Http\Controllers;

use App\Models\CarOwner;
use Illuminate\Http\Request;

class CarOwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $owners = CarOwner::latest()->paginate();
        return view('system.owners.index',compact(['owners']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $owners = CarOwner::latest()->paginate();
        return view('system.owners.create',compact(['owners']));
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
            'owner_name'    =>  'required',
            'owner_email' => 'required|unique:car_owners',
            'owner_telephone' => 'required|unique:car_owners',
            'user_id' =>  'required',
            'status'          =>  'required'
        ]);
        CarOwner::create($request->all());

        return redirect()->route('owners.index')->with('success','Car owner added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CarOwner  $carOwner
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $owners = CarOwner::latest()->paginate();
        $owner = CarOwner::find($id);
        if (!$owner) {
            return back()->with('danger','Sorry, the car owner does not exist');
        }
        return view('system.owners.show',compact(['owner','owners']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CarOwner  $carOwner
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $owners = CarOwner::latest()->paginate();
        $owner = CarOwner::find($id);
        if (!$owner) {
            return back()->with('danger','Sorry, the car owner does not exist');
        }
        return view('system.owners.edit',compact(['owner','owners']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CarOwner  $carOwner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'owner_name'    =>  'required',
            'owner_email'   => 'required',
            'owner_telephone' => 'required',
            'user_id'       =>  'required',
            'status'        =>  'required'
        ]);
        CarOwner::find($id)->update($request->all());
        return redirect()->route('owners.index')->with('success','Driver or owner updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CarOwner  $carOwner
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = CarOwner::find($id);
        $item->delete();
        return redirect()->route('owners.index')->with('danger', 'Profile deleted successfully!');
    }
}
