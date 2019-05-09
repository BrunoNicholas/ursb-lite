<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Company;

class NameReservation extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_id',
        'from_name',
        'from_telephone',
        'from_email',
        'signature_proof',
        'shared_limited_company',
        'guarantee_limited_company',
        'non_government_org',
        'name_choice_1',
        'name_choice_2',
        'name_choice_3',
        'status',
        'date',
    ];

    /**
     * The string variable is for the table.
     *
     * @var array
     */
    protected $table = 'name_reservations';

    /**
     * Belonds to relationship connects this table to 
     * the companies table and the transactions table
     *
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
