<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'url',
        'github_url',
        'status',
        'client_type',
        'start_date',
        'technologies',
        'progress',
        'image',
        'gallery',
        'documents',
    ];

    protected $casts = [
        'technologies' => 'array',
        'gallery' => 'array',
        'documents' => 'array',
        'start_date' => 'date',
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}