<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spending extends Model
{
    use HasFactory;

    protected $fillable = [
        'needs',
        'date',
        'amount',
        'receipt',
        'description',
        'createdUser',
    ];
}
