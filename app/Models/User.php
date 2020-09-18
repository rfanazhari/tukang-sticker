<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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

    public function catcarrer()
    {
        return $this->hasMany(CatCarrer::class);
    }

    public function carrer()
    {
        return $this->hasMany(Carrer::class);
    }

    public function labels()
    {
        return $this->hasMany(Label::class);
    }

    public function slider()
    {
        return $this->hasMany(Slider::class);
    }

    public function ourclient()
    {
        return $this->hasMany(OurClient::class);
    }

    public function ourservice()
    {
        return $this->hasMany(OurService::class);
    }

    public function gallery()
    {
        return $this->hasMany(Gallery::class);
    }

    public function customer()
    {
        return $this->hasMany(Customer::class);
    }

    public function transaction()
    {
        return $this->hasMany(Transaction::class, 'created_by');
    }

}
