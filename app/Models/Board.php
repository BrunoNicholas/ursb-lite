<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Department;
use App\User;

class Board extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'created_by',
        'department_id',
        'user_id',
        'title',
        'description',
        'status',
    ];

    /**
     * The string variable is for the table.
     *
     * @var array
     */
    protected $table = 'boards';

    /**
     * Belonds to relationship connects this table to 
     * the users table and the boards table
     *
     */
    public function users()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Belonds to relationship connects this table to 
     * the departments table and the boards table
     *
     */
    public function departments()
    {
        return $this->belongsTo(Department::class);
    }
}
