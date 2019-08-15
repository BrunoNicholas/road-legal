<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail as MustVerifyEmailContract;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

use App\Models\Officer;
use App\Models\Company;
use App\Models\CarOwner;
use App\Models\Question;

class User extends Authenticatable implements MustVerifyEmailContract
{
    use Notifiable;
    use EntrustUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role', 'profile_image', 'telephone', 
        'nationality', 'gender', 'status', 'occupation'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The relationship method for comments.
     *
     * as officers.
     */
    public function officers()
    {
        return $this->hasMany(Officer::class);
    }

    /**
     * The relationship method for comments.
     *
     * as companies.
     */
    public function companies()
    {
        return $this->hasMany(Company::class);
    }

    /**
     * The relationship method for comments.
     *
     * as companies.
     */
    public function car_owners()
    {
        return $this->hasMany(CarOwner::class);
    }

    /**
     * The relationship method for comments.
     *
     * as companies.
     */
    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
