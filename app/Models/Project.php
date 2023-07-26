<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'ref',
        'category_id',
        'customer_id',
        'title',
        'description',
        'project_location',
        'project_start_date',
        'project_end_date',
        'project_status'
    ];

    public function scopeOfRef($query, $ref)
    {
        return $query->where('ref', $ref);
    }
}
