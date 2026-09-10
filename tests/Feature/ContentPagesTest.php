<?php

namespace Tests\Feature;

use App\Models\Solution;
use Illuminate\Foundation\Testing\RefreshDatabase;
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
}
