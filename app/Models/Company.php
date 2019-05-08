<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ActAppointment;
use App\Models\NameReservation;
use App\Models\CoRegistration;
use App\Models\Nominal;
use App\Models\NoticeAct;
use App\Models\Transaction;

class Company extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'name',
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

    /*
     * This method is a relationship between this table
     * or model and the the appointments table
     */
    public function appointments()
    {
    	return $this->hasMany(ActAppointment::class);
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
    public function nominals()
    {
    	return $this->hasMany(Nominal::class);
    }

    /*
     * This method is a relationship between this table
     * or model and this table
     */
    public function notices()
    {
    	return $this->hasMany(NoticeAct::class);
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
