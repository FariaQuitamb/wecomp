<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ClientLocation extends Model
{
    /**
     * @var list<string>
     */
    public const PROVINCES = [
        'Luanda',
        'Bengo',
        'Icolo e Bengo',
        'Kwanza Norte',
        'Kwanza Sul',
        'Malanje',
        'Uíge',
        'Zaire',
        'Cabinda',
        'Huambo',
        'Bié',
        'Benguela',
        'Huíla',
        'Namibe',
        'Cunene',
        'Cuando Cubango',
        'Moxico',
        'Lunda Norte',
        'Lunda Sul',
    ];

    protected $fillable = [
        'client_id',
        'province',
        'places',
        'province_sort',
        'sort_order',
    ];

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    /**
     * @return list<string>
     */
    public function placesList(): array
    {
        return array_values(array_filter(array_map('trim', explode(',', (string) $this->places))));
    }

    public static function provinceSort(string $province): int
    {
        $index = array_search($province, self::PROVINCES, true);

        return $index === false ? 99 : $index + 1;
    }
}
