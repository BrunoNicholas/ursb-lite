<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Board extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'created_by',
    ];

    /**
     * The string variable is for the table.
     *
     * @var array
     */
    protected $table = 'boards';

    /**
     * Belonds to relationship connects this table to 
     * the companies table and the transactions table
     *
     */
    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
