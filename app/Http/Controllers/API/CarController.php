<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\Car;

use Illuminate\Support\Facades\DB;
use App\Http\Resources\Car as CarResource;
use App\Http\Requests\CarRequest;
use App\Http\Resources\CarCollection;

use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;

class CarController extends Controller
{
    /**
     * Display the constructor of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:api')->except('index','show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (sizeof(Car::all()) < 1) {
            return json_encode([
                'errors' => 'No saved MTP veicles'
            ]);
        }
        // return CarCollection::collection(Car::paginate());
        return Car::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CarRequest $request)
    {
        $vehicle = new Car;
        $vehicle->car_model     = $request->model;
        $vehicle->no_plate      = $request->number_plate;
        $vehicle->car_owner_id  = $request->owner;
        $vehicle->company_id    = $request->insurance;
        $vehicle->car_category  = $request->category;
        $vehicle->car_price     = $request->price;
        $vehicle->price_units   = $request->units;
        $vehicle->reg_no        = $request->registration_num;
        $vehicle->policy_no     = $request->policy_number;
        $vehicle->seating_capacity  = $request->seating_capacity;
        $vehicle->gross_weight  = $request->car_weight;
        $vehicle->premium_charged  = $request->premium;
        $vehicle->date_of_issue = $request->issued;
        $vehicle->date_of_expiry  = $request->expiry;
        $vehicle->issuing_authority  = $request->authorised;
        $vehicle->status        = $request->status;
        $vehicle->save();

        return json_encode([
            'data'  => new CarResource($vehicle)
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vehicle = Car::find($id);

        if (!$vehicle) {
            return json_encode([
                'errors' => 'MTP vehicle not found'
            ], Response::HTTP_NOT_FOUND);
        }

        return new CarResource($vehicle);
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
        $vehicle = Car::find($id);

        if (!$vehicle) {
            return json_encode([
                'errors' => 'MTP car not found!'
            ], Response::HTTP_NOT_FOUND);
        }

        $request['profile_image']  = $request->image;
        $request['profile_image']  = $request->image;
        $request['profile_image']  = $request->image;
        unset($request['image']);
        unset($request['image']);
        unset($request['image']);

        $vehicle->update($request->all());

        Car::find($id)->attachRole(Role::where('name',($request->role))->first());

        return json_encode([
            'data' => new CarResource($vehicle)
        ], Response::HTTP_CREATED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vehicle = Car::find($id);
        
        if (!$vehicle) {
            return json_encode([
                'errors' => 'MTP vehicle not found'
            ], Response::HTTP_NOT_FOUND);
        }

        $vehicle->delete();
        return response(null,Response::HTTP_NO_CONTENT);
    }
}
