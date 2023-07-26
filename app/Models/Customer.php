<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'ref',
        'name',
        'email',
        'phone',
        'address'
    ];

    public function scopeOfRef($query, $ref)
    {
        return $query->where('ref', $ref);
    }

    public function photo()
    {
        return $this->morphOne(Media::class, 'mediable')->latest();
    }
}
