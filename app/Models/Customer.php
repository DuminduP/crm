<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'mobile',
        'passport_number',
        'passport_expiry',
        'dob',
        'status',
    ];

    /**
     * Get the tickets 
     */
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

}
