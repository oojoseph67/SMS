<?php

namespace App;

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
        'fullname', 'email', 'entry_class', 'staff_phoneNumber' , 'password', 'student_id', 'staff_id' ,'role', 'profile_pic', 'manuscript',

        // 'fullname', 'email', 'dob', 'gender', 'entry_class', 'staff_phoneNumber' ,'guardian_name', 'guardian_email', 'guardian_phoneNumber', 'password', 'student_id', 'staff_id' ,'role', 'profile_pic', 'manuscript',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'role', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
