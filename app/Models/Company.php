<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\NameReservation;
use App\Models\CoRegistration;
use App\Models\Transaction;
use App\Models\Particular;
use App\Models\Certificate;
use App\Models\Logo;

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
     * the logos table as a one to many
     *
     */
    public function logos()
    {
        return $this->hasMany(Logo::class);
    }

    /**
     * Belonds to relationship connects this table to 
     * the certificates table as a one to many
     *
     */
    public function certificates()
    {
        return $this->hasMany(Certificate::class);
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

    /**
     * Belonds to relationship connects this table to 
     * the companies table and this table
     *
     */
    public function particulars()
    {
        return $this->belongsTo(Particular::class);
    }
}
