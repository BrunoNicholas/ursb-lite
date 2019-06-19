<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Board;
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
        'status',
    ];

    /**
     * The string variable is for the table.
     *
     * @var array
     */
    protected $table = 'departments';

    /*
     * This method is a relationship between this table
     * or model and the the appointments table
     */
    public function boards()
    {
        return $this->hasMany(Board::class);
    }

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
