<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'company_id',
        'poster',
        'tickets',
        'date',
        'price',
        'card_number',
        'description',
        'organizer_info',
        'format',
        'theme_id',
        'location',
        'publishing_date'
    ];
}
