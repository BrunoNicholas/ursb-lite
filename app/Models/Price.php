<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
        'quantity'
        'previous_price'
        'current_price'
        'comment'
    ];

    /**
     * The string variable is for the table.
     *
     * @var array
     */
    protected $table = 'prices';
}
