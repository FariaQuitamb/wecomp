<?php

namespace Tests\Feature;

use App\Filament\Resources\Clients\Pages\EditClient;
use App\Filament\Resources\Clients\Pages\ListClients;
use App\Models\Client;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Livewire\Livewire;
use Tests\TestCase;

class ClientCmsTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed();
    }

    public function test_clients_are_listed_in_the_cms(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        Livewire::test(ListClients::class)
            ->assertOk()
            ->assertSee('Banco Sol')
            ->assertSee('FreshMart');
    }

    public function test_client_logo_can_be_updated_in_the_cms(): void
    {
        Storage::fake('public');

        $user = User::factory()->create();
        $client = Client::query()->where('slug', 'banco-sol')->firstOrFail();

        $this->actingAs($user);

        Livewire::test(EditClient::class, ['record' => $client->getRouteKey()])
            ->fillForm([
                'logo' => UploadedFile::fake()->image('banco-sol.png'),
            ])
            ->call('save')
            ->assertHasNoFormErrors();

        $client->refresh();

        $this->assertNotNull($client->logo);
        Storage::disk('public')->assertExists($client->logo);
    }
}
