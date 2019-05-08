<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\EntrustRole;
use App\User;

class Role extends EntrustRole
{
    protected $fillable = [
    	'name','display_name','description'
    ];

    /*
     * This method is a relationship between this table
     * or model and the the users table
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
