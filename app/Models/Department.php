<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Department extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'level',
        'created_by',
        'description',
    ];

    /**
     * The string variable is for the table.
     *
     * @var array
     */
    protected $table = 'departments';

    /**
     * Belonds to relationship connects this table to 
     * the users table as a many to one
     *
     */
    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
