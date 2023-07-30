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
        'location',
        'start_date',
        'end_date',
        'status',
        'thumbnail_id'
    ];

    public function scopeOfRef($query, $ref)
    {
        return $query->where('ref', $ref);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function partners()
    {
        return $this->belongsToMany(Partner::class, 'project_partner', 'project_id', 'partner_id');
    }

    public function thumbnail()
    {
        return $this->belongsTo(Media::class, 'thumbnail_id', 'id');
    }

    public function photos()
    {
        return $this->morphMany(Media::class, 'mediable');
    }
}
