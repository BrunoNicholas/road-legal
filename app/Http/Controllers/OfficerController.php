<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Role;
use App\Models\Officer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OfficerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $officers = Officer::latest()->paginate();
        return view('system.officers.index',compact(['officers']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $officers = Officer::latest()->paginate();
        $users = User::where('role','user')->get();
        return view('system.officers.create',compact(['officers','users']));
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
            'user_id'   =>  'required',
            'status'    =>  'required'
        ]);
        Officer::create($request->all());

        $user = User::find($request->user_id);
        $user->role = 'officer';
        $user->save();

        DB::table('role_user')->where('user_id',$request->user_id)->delete();
        $user->attachRole(Role::where('name','officer')->first());

        return redirect()->route('officers.index')->with('success','Officer account saved successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Officer  $officer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Officer  $officer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $officer = Officer::find($id);
        $officers = Officer::all();
        if (!$officer) {
            return back()->with('danger','Sorry, officer account does not exist!');
        }
        return view('system.officers.edit',compact(['officers','officer']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Officer  $officer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Officer  $officer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Officer::find($id);
        $item->delete();
        return redirect()->route('officers.index')->with('danger', 'Traffic officer\'s profile deleted successfully!');
    }
}
