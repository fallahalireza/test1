<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public function getNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }


    const GENDER_CODE_MALE = 1;
    const GENDER_CODE_FEMALE = 2;

    public function getGenderAttribute()
    {
        if ($this->gender_code === self::GENDER_CODE_MALE) {
            return 'male';
        } elseif ($this->gender_code === self::GENDER_CODE_FEMALE) {
            return 'female';
        } else {
            return null;
        }
    }

    protected $appends = ['gender','name'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'father_name',
        'personel_code',
        'identity_no',
        'code_melli',
        'birth_year',
        'birth_month',
        'birth_day',
        'birth_date',
        'gender_code',

        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
