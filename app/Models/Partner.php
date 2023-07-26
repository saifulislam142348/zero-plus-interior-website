<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;

    protected $fillable = [
        'ref',
        'name',
        'email',
        'phone',
        'description'
    ];

    public function scopeOfRef($query, $ref)
    {
        return $query->where('ref', $ref);
    }

    public function logo()
    {
        return $this->morphOne(Media::class, 'mediable')->latest();
    }
}
