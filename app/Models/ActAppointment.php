<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Company;

class ActAppointment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_id',
    ];

    /**
     * The string variable is for the table.
     *
     * @var array
     */
    protected $table = 'act_appointments';
    
    /**
     * Belonds to relationship connects this table to 
     * the companies table and the transactions table
     *
     */
	public function companies()
	{
		return $this->belongsTo(Company::class);
	}


}
