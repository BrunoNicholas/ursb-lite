<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Company;

class Logo extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_id',
        'image',
        'description',
    ];

    /**
     * The string variable is for the table.
     *
     * @var array
     */
    protected $table = 'logos';

    /**
     * Belonds to relationship connects this table to 
     * the companies table as a many to one
     *
     */
    public function companies()
    {
        return $this->belongsTo(Company::class);
    }
}
