<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Role;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $companies = Company::where('status',strtolower('active'))->get();
        $gpspont = array();

        foreach ($companies as $val) {
            array_push($gpspont, explode(' ', $val->location));
        }

        $gpsponts = json_encode($gpspont);

        if (Auth::user()->hasRole(['super-admin','admin'])) {
            return redirect()->route('admin')->with('info','Welcome back, ' . (Role::where('name',Auth::user()->role)->get()->first())->display_name . ' - ' . Auth::user()->name . '!');
        }
        $ptNum = sizeof($gpspont);
        return view('home',compact(['gpsponts','ptNum']))->with('info','Welcome back, ' . ' - ' . Auth::user()->name . '!'); 
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function userIndex()
    {
        $companies = Company::where('status',strtolower('active'))->get();
        $gpspont = array();

        foreach ($companies as $val) {
            array_push($gpspont, explode(' ', $val->location));
        }

        $gpsponts = json_encode($gpspont);
        $ptNum = sizeof($gpspont);
        return view('home',compact(['gpsponts','ptNum']))->with('info','Welcome back, ' . ' - ' . Auth::user()->name . '!');
    }
}
