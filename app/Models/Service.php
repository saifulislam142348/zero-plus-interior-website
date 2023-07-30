<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'ref',
        'title',
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

    public function photos()
    {
        return $this->morphMany(Media::class, 'mediable')->whereNot('id', $this->photo?->id)->take(2)->latest();
    }
}
