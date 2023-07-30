<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'ref',
        'phone',
        'alternative_phone',
        'email',
        'alternative_email',
        'office_time',
        'office_weekend',
        'address_line_1',
    ];
}
