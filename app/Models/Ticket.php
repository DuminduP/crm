<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'customer_id',
        'from',
        'to',
        'airline',
    ];

    /**
     * Get the user that owns the phone.
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

}
