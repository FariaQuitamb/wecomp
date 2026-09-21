<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class Page extends Model
{
    protected $fillable = [
        'slug',
        'name',
        'title',
        'meta_description',
        'data',
    ];

    protected function casts(): array
    {
        return [
            'data' => 'array',
        ];
    }

    public static function for(string $slug): self
    {
        $empty = new static([
            'slug' => $slug,
            'name' => 'Wecomp',
            'title' => 'Wecomp',
            'meta_description' => '',
            'data' => [],
        ]);

        if (! Schema::hasTable((new static)->getTable())) {
            return $empty;
        }

        return static::query()->where('slug', $slug)->first() ?? $empty;
    }

    public function get(string $key, mixed $default = null): mixed
    {
        return data_get($this->data, $key, $default);
    }

    public function items(string $key): array
    {
        $value = $this->get($key, []);

        return is_array($value) ? $value : [];
    }

    public function imageUrl(string $key, string $fallback): string
    {
        $path = (string) $this->get($key, $fallback);

        if ($path === '') {
            $path = $fallback;
        }

        if (Storage::disk('public')->exists($path)) {
            return Storage::disk('public')->url($path);
        }

        $filename = basename($path);

        if (is_file(public_path('images/'.$filename))) {
            return asset('images/'.$filename);
        }

        return asset('images/'.$fallback);
    }
}
