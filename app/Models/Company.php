<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ActAppointment;

class Company extends Model
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


    public function apppointments()
    {
    	return $this->hasMany(ActAppointment::class);
    }
}
