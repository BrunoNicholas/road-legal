<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\CarOwner;

class CarCollection extends JsonResource
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
            'id'        => $this->id,
            'number_plate'  => $this->no_plate,
            'owner'     => $this->car_owner_id ? CarOwner::find($this->car_owner_id)->owner_name : 'unknown',
            'owner_details' => route('api-owners.show',$this->car_owner_id),
            'model'     => $this->car_model,
            'insurance'    => $this->company_id,
            'category'     => $this->car_category,
            'price'     => $this->car_price,
            'units'     => $this->price_units,
            'registration_num'  => $this->reg_no,
            'policy_number'     => $this->policy_no,
            'seating_capacity'     => $this->seating_capacity,
            'car_weight'     => $this->gross_weight,
            'premium'     => $this->premium_charged,
            'issued'     => $this->date_of_issue,
            'expiry'     => $this->date_of_expiry,
            'authorised'     => $this->issuing_authority,
            'status'     => $this->status,
            'added'     => $this->created_at,
            'details'   => route('api-vehicles.show',$this->id),
        ];
    }
}
