<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    protected $fillable = [
        'start_city',
        'end_city',
        'start_date',
        'end_date',
        'price',
        'seats',
    ];

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
