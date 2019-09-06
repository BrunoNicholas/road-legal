<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Officer;
use App\Models\CarOwner;
use App\Models\Car;
use App\User;

class Crime extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'officer_id',
        'car_owner_id',
        'car_id',
        'category',
        'fine_amount',
        'description',
        'status'
    ];

    /**
     * The string variable is for the table.
     *
     * @var array
     */
    protected $table = 'crimes';
    
    /**
     * Belonds to relationship connects both 
     * the user table and this table
     *
     */
    public function users()
    {
        return $this->belongsTo(User::class);
    }
    
    /**
     * Belonds to relationship connects both 
     * the officers table and this table
     *
     */
    public function officers()
    {
        return $this->belongsTo(Officer::class);
    }
    
    /**
     * Belonds to relationship connects both 
     * the car_owners table and this table
     *
     */
    public function car_owners()
    {
        return $this->belongsTo(CarOwner::class);
    }
    
    /**
     * Belonds to relationship connects both 
     * the cars table and this table
     *
     */
    public function cars()
    {
        return $this->belongsTo(Car::class);
    }
}
