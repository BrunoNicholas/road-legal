<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Account;
use App\Models\Car;

class CarOwner extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'owner_name',
        'owner_email',
        'owner_telephone',
        'user_id',
        'status'
    ];

    /**
     * The string variable is for the table.
     *
     * @var array
     */
    protected $table = 'car_owners';
    

    /**
     * The relationship method for comments.
     *
     * as cars.
     */
    public function cars()
    {
        return $this->hasMany(Car::class);
    }

    /**
     * The relationship method for comments.
     *
     * as accounts.
     */
    public function accounts()
    {
        return $this->hasMany(Account::class);
    }

    /**
     * Belonds to relationship connects both 
     * the user table and the books table
     *
     */
    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
