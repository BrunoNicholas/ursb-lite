<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\NameReservation;
use App\Models\CoRegistration;
use App\Models\Transaction;
use App\Models\Particular;

class Company extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'particular_id',
    	'created_by',
    	'owned_by',
    	'address',
    	'email',
    	'contact',
    ];

    /**
     * The string variable is for the table.
     *
     * @var array
     */
    protected $table = 'companies';

    /**
     * Belonds to relationship connects this table to 
     * the companies table and this table
     *
     */
    public function particulars()
    {
        return $this->belongsTo(Particular::class);
    }

    /*
     * This method is a relationship between this table
     * or model and the the appointments table
     */
    public function reservations()
    {
    	return $this->hasMany(NameReservation::class);
    }

    /*
     * This method is a relationship between this table
     * or model and the the appointments table
     */
    public function transactions()
    {
    	return $this->hasMany(Transaction::class);
    }

    /*
     * This method is a relationship between this table
     * or model and the the registrations table
     */
    public function registrations()
    {
    	return $this->hasMany(CoRegistration::class);
    }
}
