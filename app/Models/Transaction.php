<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Receipt;

class Transaction extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];

    /**
     * The string variable is for the table.
     *
     * @var array
     */
    protected $table = '';

    /**
     * Belonds to relationship connects both 
     * the user table and the receipts table
     *
     */
    public function receipts()
    {
        return $this->hasMany(Receipt::class);
    }
}
