<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Car;

class Company extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_name',
        'company_email',
        'company_telephone',
        'user_id',
        'location',
        'drivers_number',
        'status'
    ];

    /**
     * The string variable is for the table.
     *
     * @var array
     */
    protected $table = 'companies';
    
    /**
     * Belonds to relationship connects both 
     * the user table and the books table
     *
     */
    public function users()
    {
        return $this->belongsTo(User::class);
    }

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
}
