<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Company;

class CoRegistration extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_id',
        'user_photo',
        'subscriber1',
        'subscriber2',
        'subscriber3',
        'address',
        'business_nature',
        'business_place',
        'proposed_share_capital',
        'address',
        'subscriber_proof1',
        'subscriber_proof2',
        'subscriber_proof3',
        'status',
    ];

    /**
     * The string variable is for the table.
     *
     * @var array
     */
    protected $table = 'co_registrations';

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
