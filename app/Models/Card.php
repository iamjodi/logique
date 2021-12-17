<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $table = 'card';

    protected $fillable = [
        'address',
        'dob',
        'member_type',
        'number',
        'type_card',
        'expired_date',
    ];
}
