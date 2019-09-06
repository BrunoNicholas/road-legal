<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\User;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\User as UserResource;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserCollection;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
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
        if (sizeof(User::all()) < 1) {
            return json_encode([
                'errors' => 'No saved users'
            ]);
        }
        return UserCollection::collection(User::paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user = User;
        $user->name     = $request->name;
        $user->email     = $request->email;
        $user->profile_image     = $request->image;
        $user->gender     = $request->gender;
        $user->date_of_birth     = $request->birth_date;
        $user->telephone    = $request->phone;
        $user->location     = $request->location;
        $user->occupation   = $request->work;
        $user->institution  = $request->campus;
        $user->church   = $request->church;
        $user->nationality      = $request->nationality;
        $user->role     = $request->role;
        $user->bio      = $request->bio;
        $user->year_enrolled    = $request->start;
        $user->unenrollment_year    = $request->end;
        $user->status       = $request->status;
        $user->created_at   = $request->joined;
        $user->save();

        DB::table('role_user');

        $user->attachRole(Role::where('name',($request->role))->first());

        return json_encode([
            'data'  => new UserResource($user)
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
        $user = User::find($id);

        if (!$user) {
            return json_encode([
                'errors' => 'User not found'
            ], Response::HTTP_NOT_FOUND);
        }

        return new UserResource($user);
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
        $user = User::find($id);

        if (!$user) {
            return json_encode([
                'errors' => 'User not found'
            ], Response::HTTP_NOT_FOUND);
        }

        $request['profile_image']  = $request->image;
        $request['date_of_birth']  = $request->birth_date;
        $request['telephone']   = $request->phone;
        $request['occupation']  = $request->work;
        $request['institution'] = $request->campus;
        $request['year_enrolled']   = $request->start;
        $request['unenrollment_year']  = $request->end;
        $request['status']      = $request->status;
        unset($request['image']);
        unset($request['birth_date']);
        unset($request['phone']);
        unset($request['work']);
        unset($request['campus']);
        unset($request['start']);
        unset($request['end']);
        unset($request['status']);

        $user->update($request->all());

        DB::table('role_user')->where('user_id',$id)->delete();
        User::find($id)->attachRole(Role::where('name',($request->role))->first());

        return json_encode([
            'data' => new UserResource($user)
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
        $user = User::find($id);
        
        if (!$user) {
            return json_encode([
                'errors' => 'User profile not found'
            ], Response::HTTP_NOT_FOUND);
        }

        $user->delete();
        
        return response(null,Response::HTTP_NO_CONTENT);
    }
}
