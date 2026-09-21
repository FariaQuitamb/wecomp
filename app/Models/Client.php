<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Client extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'sector',
        'logo',
        'is_featured',
        'is_published',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'is_featured' => 'boolean',
            'is_published' => 'boolean',
        ];
    }

    protected static function booted(): void
    {
        static::saving(function (Client $client): void {
            if (blank($client->slug) && filled($client->name)) {
                $client->slug = Str::slug($client->name);
            }
        });
    }

    public function locations(): HasMany
    {
        return $this->hasMany(ClientLocation::class)
            ->orderBy('province_sort')
            ->orderBy('sort_order');
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    public function scopeFeatured($query)
    {
        return $query->published()->where('is_featured', true)->orderBy('sort_order')->orderBy('name');
    }
}
