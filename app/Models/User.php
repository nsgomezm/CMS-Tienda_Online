<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'lastname', 'role', 'email', 'password',
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


    public function setPasswordAttribute($value){
        $this->attributes['password'] = \Illuminate\Support\Facades\Hash::make($value);
    }

    public function getFullNameAttribute(){
        return "{$this->name} {$this->lastname}";
    }

    public function getShortFullNameAttribute(){
        $explodeName = explode(" ", $this->full_name );

        return  count($explodeName) >= 3 ? "$explodeName[0] $explodeName[2]" : "$explodeName[0] $explodeName[1]" ;
    }
}
