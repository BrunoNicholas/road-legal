<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Company;
use App\Models\CarOwner;

class Car extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'car_model',
        'no_plate',
        'car_owner_id',
        'company_id',
        'car_category',
        'car_price',
        'price_units',
        'reg_no',
        'policy_no',
        'seating_capacity',
        'gross_weight',
        'premium_charged',
        'date_of_issue',
        'date_of_expiry',
        'issuing_authority'
    ];

    /**
     * The string variable is for the table.
     *
     * @var array
     */
    protected $table = 'cars';

    /**
     * Belonds to relationship connects both 
     * the user table and the books table
     *
     */
    public function car_owners()
    {
        return $this->belongsTo(CarOwner::class);
    }

    /**
     * Belonds to relationship connects both 
     * the user table and the books table
     *
     */
    public function companies()
    {
        return $this->belongsTo(Company::class);
    }
}
