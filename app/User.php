<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;
// use Laravel\Passport\HasApiTokens;
use App\Models\Role;
use App\Models\Board;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    // use HasApiTokens;
    use EntrustUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'username', 'telephone',
        'gender', 'profile_image', 'date_of_birth', 'level',
        'nationality', 'location', 'role', 'occupation', 'status',
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

    // hasVerifiedEmail()
    // markEmailAsVerified()
    // sendEmailVerificationNotification()

    /*
     * This method is a relationship between this table
     * or model and the the appointments table
     */
    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    /*
     * This method is a relationship between this table
     * or model and the the appointments table
     */
    public function boards()
    {
        return $this->hasMany(Board::class);
    }
}
