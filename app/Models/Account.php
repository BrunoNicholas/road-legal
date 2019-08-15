<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'car_owner_id',
        'company_id',
        'balance',
        'debt',
        'status'
    ];

    /**
     * The string variable is for the table.
     *
     * @var array
     */
    protected $table = 'accounts';

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
