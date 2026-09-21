<?php

namespace Tests\Feature;

use App\Models\Client;
use App\Models\Page;
use App\Models\Solution;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ContentPagesTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed();
    }

    public function test_all_institutional_pages_are_available(): void
    {
        foreach (['home', 'solutions', 'sectors', 'about', 'results', 'contact', 'privacy', 'terms'] as $route) {
            $this->get(route($route))->assertOk();
        }
    }

    public function test_published_solution_and_sector_pages_are_available(): void
    {
        $this->get(route('solutions.show', 'seguranca-contra-incendios'))
            ->assertOk()
            ->assertSee('Segurança Contra Incêndios');

        $this->get(route('sectors.show', 'banca-e-financas'))
            ->assertOk()
            ->assertSee('Setor Bancário e Financeiro');
    }

    public function test_unpublished_content_is_not_public(): void
    {
        $solution = Solution::query()->create([
            'title' => 'Rascunho',
            'slug' => 'rascunho',
            'excerpt' => 'Conteúdo ainda não publicado.',
            'is_published' => false,
        ]);

        $this->get(route('solutions.show', $solution))->assertNotFound();
    }

    public function test_institutional_copy_comes_from_the_cms(): void
    {
        $page = Page::query()->where('slug', 'home')->firstOrFail();
        $data = $page->data;
        $data['hero_title'] = 'Texto editado no CMS';
        $page->update(['data' => $data]);

        $this->get(route('home'))
            ->assertOk()
            ->assertSee('Texto editado no CMS');
    }

    public function test_results_page_shows_client_portfolio(): void
    {
        $this->get(route('results'))
            ->assertOk()
            ->assertSee('Carteira de clientes em 21 províncias.')
            ->assertSee('Banco Sol')
            ->assertSee('Millennium Atlântico')
            ->assertSee('FreshMart')
            ->assertSee('Luanda')
            ->assertSee('Cabinda')
            ->assertSee('Maculusso (Sede)')
            ->assertSee('Promasidor');
    }

    public function test_results_page_shows_client_logo_from_cms(): void
    {
        Storage::fake('public');
        Storage::disk('public')->put('content/clients/banco-sol.png', 'logo');

        Client::query()
            ->where('slug', 'banco-sol')
            ->update(['logo' => 'content/clients/banco-sol.png']);

        $this->get(route('results'))
            ->assertOk()
            ->assertSee('content/clients/banco-sol.png');
    }
}
