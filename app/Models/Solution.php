<?php

namespace App\Models;

use Database\Factories\SolutionFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Storage;

class Solution extends Model
{
    /** @use HasFactory<SolutionFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'eyebrow',
        'excerpt',
        'content',
        'legal_framework',
        'hero_image',
        'is_published',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'is_published' => 'boolean',
        ];
    }

    public function sectors(): BelongsToMany
    {
        return $this->belongsToMany(Sector::class);
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true)->orderBy('sort_order');
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function getHeroImageUrlAttribute(): string
    {
        if ($this->hero_image && Storage::disk('public')->exists($this->hero_image)) {
            return Storage::disk('public')->url($this->hero_image);
        }

        return asset('images/'.($this->hero_image ?: 'solucoes-integradas.jpg'));
    }
}
