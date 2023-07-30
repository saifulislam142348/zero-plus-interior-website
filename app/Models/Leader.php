<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leader extends Model
{
    use HasFactory;

    protected $fillable = [
        'ref',
        'name',
        'designation',
        'description'
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
