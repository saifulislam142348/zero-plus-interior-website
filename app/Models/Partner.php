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

    public function media()
    {
        $this->morphOne(Media::class, 'mediable');
    }
}
