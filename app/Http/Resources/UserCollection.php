<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Role;

class UserCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name'  => $this->name,
            'email' => $this->email,
            'image' => $this->profile_image ? url('/files/profile/images/' . $this->profile_image) : '',
            'phone' => $this->telephone,
            'role'  => $this->role ? (Role::where('name',$this->role)->get()->first())->display_name : 'unknown',
            'work'  => $this->occupation,
            'link'  => route('api-users.show', $this->id),
        ];
    }
}
