<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'status',
        'client_type',
        'member_count',
        'start_date',
        'technologies',
        'progress',
        'client_name',
        'image',
        'gallery',
        'documents',
    ];

    protected $casts = [
        'technologies' => 'array',
        'start_date' => 'date',
        'gallery' => 'array',
        'documents' => 'array',
    ];
}