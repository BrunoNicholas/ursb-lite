<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Company;

class Nominal extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_id',
        'company_number',
        'matter_of',
        'space_1_1',
        'space_1_2',
        'space_1_3',
        'space_1_4',
        'space_2_1',
        'amount',
        'space_2_2',
        'total_shares_1',
        'amount_1',
        'unit_share_amount_1',
        'total_shares_2',
        'unit_share_amount_2',
        'dated_at',
        'withness_proof',
        'withness_name',
        'withness_address',
        'withness_occupation',
    ];

    /**
     * The string variable is for the table.
     *
     * @var array
     */
    protected $table = 'nominals';

    /**
     * Belonds to relationship connects this table to 
     * the companies table and this table
     *
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
