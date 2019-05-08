<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Company;

class NoticeAct extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_id',
        'note_1',
        'presented_by',
        'notice_2',
        'company_name_registrar',
        'registered_address',
        'start_date',
        'end_date',
        'authorized_by',
        'created_by',
    ];

    /**
     * The string variable is for the table.
     *
     * @var array
     */
    protected $table = 'notice_acts';

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
