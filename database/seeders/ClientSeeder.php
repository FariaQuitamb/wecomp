<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\ClientLocation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ClientSeeder extends Seeder
{
    public function run(): void
    {
        $featured = [
            'Banco Sol' => ['sector' => 'banca', 'order' => 1],
            'Millennium Atlântico' => ['sector' => 'banca', 'order' => 2],
            'Banco Yetu' => ['sector' => 'banca', 'order' => 3],
            'Kixicrédito' => ['sector' => 'banca', 'order' => 4],
            'FreshMart' => ['sector' => 'retalho', 'order' => 5],
            'LC Waikiki' => ['sector' => 'retalho', 'order' => 6],
            'Sakidila' => ['sector' => 'retalho', 'order' => 7],
            'Kibabo' => ['sector' => 'retalho', 'order' => 8],
            'DHL' => ['sector' => 'industria', 'order' => 9],
            'Promasidor' => ['sector' => 'industria', 'order' => 10],
            'Mundial Seguros' => ['sector' => 'industria', 'order' => 11],
            'Academia BAI' => ['sector' => 'industria', 'order' => 12],
        ];

        $order = 20;

        foreach ($this->portfolio() as $entry) {
            $client = $this->upsertClient(
                $entry['name'],
                $featured[$entry['name']]['sector'] ?? $entry['sector'],
                isset($featured[$entry['name']]),
                $featured[$entry['name']]['order'] ?? $order++,
            );

            $client->locations()->updateOrCreate(
                ['province' => $entry['province']],
                [
                    'places' => $entry['places'],
                    'province_sort' => ClientLocation::provinceSort($entry['province']),
                    'sort_order' => $entry['sort'],
                ],
            );
        }

        foreach ($featured as $name => $meta) {
            $this->upsertClient($name, $meta['sector'], true, $meta['order']);
        }
    }

    /**
     * @return list<array{name: string, sector: string, province: string, places: string, sort: int}>
     */
    private function portfolio(): array
    {
        $rows = [];

        foreach ($this->provinces() as $province => $groups) {
            foreach ($groups as $index => $group) {
                if ($group['name'] === 'Empresas') {
                    foreach (array_map('trim', explode(',', $group['places'])) as $company) {
                        if ($company === '') {
                            continue;
                        }

                        $rows[] = [
                            'name' => $company,
                            'sector' => $this->companySector($company),
                            'province' => $province,
                            'places' => '',
                            'sort' => $index + 20,
                        ];
                    }

                    continue;
                }

                $rows[] = [
                    'name' => $group['name'],
                    'sector' => $group['sector'],
                    'province' => $province,
                    'places' => $group['places'],
                    'sort' => $index + 1,
                ];
            }
        }

        return $rows;
    }

    /**
     * @return array<string, list<array{name: string, sector: string, places: string}>>
     */
    private function provinces(): array
    {
        return [
            'Luanda' => [
                ['name' => 'Banco Sol', 'sector' => 'banca', 'places' => 'Maculusso (Sede), Talatona, Luanda Centro, Bairro Popular, SIAC Cazenga, KM30, Veredas das Flores, Morro Bento, Benfica, Benfica 2, Samba, Lar do Patriota, Jardim de Rosas, Nova Vida, Golf 2, Gamek, ISIA, Vila Nova, Kilamba, Vila Alice, Cacuaco'],
                ['name' => 'Millennium Atlântico', 'sector' => 'banca', 'places' => 'Benfica, Viana Pumangol, Kikolo, Cacuaco Vila'],
                ['name' => 'FreshMart', 'sector' => 'retalho', 'places' => 'Samba, Kika Gil, Zango 8000, Patriota, Camama, Zé Quintas, Km 25, Ex-Combatentes, Centralidades'],
                ['name' => 'Sakidila', 'sector' => 'retalho', 'places' => 'KK5000, Zango 3, Sequele'],
                ['name' => 'LC Waikiki', 'sector' => 'retalho', 'places' => 'Desvio do Zango, Mutamba, Belas Shopping'],
                ['name' => 'Kixicrédito', 'sector' => 'banca', 'places' => 'Luanda'],
                ['name' => 'Kibabo', 'sector' => 'retalho', 'places' => 'Luanda'],
                ['name' => 'Empresas', 'sector' => 'industria', 'places' => 'Academia BAI, Anjani Food, ABC Cosmetic, DHL, Sociedade Hoteleira, Transmaka, Yongjin, Fermat, Imovias, Mota Tavares, Delight Catering, Quinta dos Reis, Newaco, Promasidor, Banco Yetu, Mundial Seguros, FADA, Grupo Zara, Sistec, Embal Vidros, Greenwast, Elephant Bet, Flux'],
            ],
            'Huambo' => [
                ['name' => 'Millennium Atlântico', 'sector' => 'banca', 'places' => 'Huambo, Longonjo, Tchicala-Tchololanga'],
                ['name' => 'Banco Sol', 'sector' => 'banca', 'places' => 'Huambo, Bailundo'],
            ],
            'Cabinda' => [
                ['name' => 'Banco Sol', 'sector' => 'banca', 'places' => 'Cabinda'],
                ['name' => 'Millennium Atlântico', 'sector' => 'banca', 'places' => 'Cabinda'],
            ],
            'Zaire' => [
                ['name' => 'Millennium Atlântico', 'sector' => 'banca', 'places' => 'Soyo'],
                ['name' => 'Banco Sol', 'sector' => 'banca', 'places' => 'Soyo'],
            ],
            'Benguela' => [
                ['name' => 'Banco Sol', 'sector' => 'banca', 'places' => 'Benguela, Lobito, Bela Vista Lobito, Ganda'],
            ],
            'Lunda Norte' => [
                ['name' => 'Barragem do Luachimo', 'sector' => 'industria', 'places' => 'Luachimo'],
            ],
            'Lunda Sul' => [
                ['name' => 'Banco Sol', 'sector' => 'banca', 'places' => 'Saurimo'],
                ['name' => 'Edifício do Autarca', 'sector' => 'industria', 'places' => 'Saurimo'],
            ],
            'Kwanza Norte' => [
                ['name' => 'Hospital Municipal do Lucala', 'sector' => 'industria', 'places' => 'Lucala'],
                ['name' => 'Banco Sol', 'sector' => 'banca', 'places' => "N'dalatando"],
            ],
            'Bengo' => [
                ['name' => 'AESCO', 'sector' => 'industria', 'places' => 'Bengo'],
                ['name' => 'Banco Sol', 'sector' => 'banca', 'places' => 'Caxito'],
            ],
            'Huíla' => [
                ['name' => 'Banco Sol', 'sector' => 'banca', 'places' => 'Lubango'],
            ],
            'Namibe' => [
                ['name' => 'Banco Sol', 'sector' => 'banca', 'places' => 'Namibe'],
            ],
            'Cuando Cubango' => [
                ['name' => 'Millennium Atlântico', 'sector' => 'banca', 'places' => 'Cuando Cubango'],
                ['name' => 'Banco Sol', 'sector' => 'banca', 'places' => 'Menongue'],
            ],
            'Moxico' => [
                ['name' => 'FreshMart', 'sector' => 'retalho', 'places' => 'Luena'],
                ['name' => 'Banco Sol', 'sector' => 'banca', 'places' => 'Luena'],
            ],
            'Cunene' => [
                ['name' => 'Banco Sol', 'sector' => 'banca', 'places' => 'Ondjiva'],
            ],
            'Uíge' => [
                ['name' => 'Banco Sol', 'sector' => 'banca', 'places' => 'Uíge, Negage'],
            ],
            'Malanje' => [
                ['name' => 'Banco Sol', 'sector' => 'banca', 'places' => 'Malanje, Cacuso'],
            ],
            'Kwanza Sul' => [
                ['name' => 'Banco Sol', 'sector' => 'banca', 'places' => 'Quibala, Waku Kungo, Porto Amboim, Dondo'],
            ],
            'Bié' => [
                ['name' => 'Banco Sol', 'sector' => 'banca', 'places' => 'Kuito'],
            ],
            'Icolo e Bengo' => [
                ['name' => 'Hospital Dom Emílio Nascimento', 'sector' => 'industria', 'places' => 'Icolo e Bengo'],
            ],
        ];
    }

    private function upsertClient(string $name, string $sector, bool $featured, int $order): Client
    {
        return Client::query()->updateOrCreate(
            ['slug' => Str::slug($name)],
            [
                'name' => $name,
                'sector' => $sector,
                'is_featured' => $featured,
                'is_published' => true,
                'sort_order' => $order,
            ],
        );
    }

    private function companySector(string $name): string
    {
        return match ($name) {
            'Banco Yetu' => 'banca',
            'Kixicrédito' => 'banca',
            'FreshMart', 'LC Waikiki', 'Sakidila', 'Kibabo', 'Grupo Zara' => 'retalho',
            default => 'industria',
        };
    }
}
