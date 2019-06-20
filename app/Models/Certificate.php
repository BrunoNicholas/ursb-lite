<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\Company;

class Certificate extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'company_id',
    	'image_1',
    	'image_2',
    	'title',
    	'date',
    	'registrar_id',
    	'description',
    	'status',
    ];

    /**
     * The string variable is for the table.
     *
     * @var array
     */
    protected $table = 'certificates';

    /**
     * Belonds to relationship connects this table to 
     * the users table and this table
     *
     */
    public function users()
    {
        return $this->belongsTo(User::class);
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
