<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Role;

class User extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'    => $this->id,
            'name'  => $this->name,
            'email' => $this->email,
            'image' => $this->profile_image ? url('/files/profile/images/' . $this->profile_image) : '',
            'gender'    => $this->gender,
            'phone' => $this->telephone,
            'role'  => $this->role ? (Role::where('name',$this->role)->get()->first())->display_name : 'unknown',
            'work'  => $this->occupation,
            'nationality'   => $this->nationality,
            'status'    => $this->status,
            'updated'=> $this->updated_at,
            'joined'=> $this->created_at,
            'link'  => route('api-users.index'),
        ];
    }
}
