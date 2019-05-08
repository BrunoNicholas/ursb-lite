<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Receipt;
use App\Models\Company;

class Transaction extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_id',
        'biller_from',
        'billed_to',
        'due_date'
        'paid_by'
        'amount'
        'quantity'
        'reason'
    ];

    /**
     * The string variable is for the table.
     *
     * @var array
     */
    protected $table = 'transactions';

    /**
     * This method is a relationship between this table
     * the user table and the receipts table
     *
     */
    public function receipts()
    {
        return $this->hasMany(Receipt::class);
    }

    /**
     * Belonds to relationship connects this table to 
     * the companies table and this table
     *
     */
    public function companies()
    {
        return $this->belongsTo(Company::class);
    }
}
