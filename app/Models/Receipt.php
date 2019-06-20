<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Transaction;

class Receipt extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'transaction_id',
        'from',
        'to',
        'amount',
        'total',
        'balance',
        'comment',
    ];

    /**
     * The string variable is for the table.
     *
     * @var array
     */
    protected $table = 'receipts';

    /**
     * Belonds to relationship connects both 
     * the user table and the cells table
     *
     */
    public function transactions()
    {
        return $this->belongsTo(Transaction::class);
    }
}
