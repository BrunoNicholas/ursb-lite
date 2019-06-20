<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\NameReservation;
use App\Models\Company;

class Particular extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'name_reservation_id',
    	'description',
    	'contact_email',
    	'contact_telephone',
    	'location',
    	'partner_1',
    	'partner_1_details',
    	'partner_2',
    	'partner_2_details',
    	'partner_3',
    	'partner_3_details',
    	'partner_4',
    	'partner_4_details',
    	'commencement_date',
    	'level',
    	'status',
    ];

    /**
     * The string variable is for the table.
     *
     * @var array
     */
    protected $table = 'particulars';

    /**
     * Belonds to relationship connects this table to 
     * the particulars table as a one to many
     *
     */
    public function name_reservations()
    {
        return $this->belongsTo(NameReservation::class);
    }

    /**
     * Belonds to relationship connects this table to 
     * the particulars table as a one to many
     *
     */
    public function companies()
    {
        return $this->hasMany(Company::class);
    }
}
