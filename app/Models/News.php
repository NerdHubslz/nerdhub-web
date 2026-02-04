<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class News extends Model
{
    /** @use HasFactory<\Database\Factories\NewsFactory> */
    use HasFactory;

    protected $fillable = [
        'titulo',
        'slug',
        'conteudo',
        'imagem_url',
        'autor',
        'category_id',
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'autor');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the news content as HTML.
     *
     * @return string
     */
    public function getHtmlContentAttribute(): string
    {
        return $this->conteudo ?? '';
    }

    /**
     * Get a plain text excerpt of the news content.
     *
     * @return string
     */
    public function getExcerptAttribute(): string
    {
        $plainText = strip_tags($this->conteudo ?? '');

        return \Illuminate\Support\Str::limit($plainText, 150);
    }
}
