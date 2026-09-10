<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContactFormTest extends TestCase
{
    use RefreshDatabase;

    public function test_contact_page_is_available(): void
    {
        $this->get(route('contact'))
            ->assertOk()
            ->assertSee('Vamos avaliar os riscos da sua operação.');
    }

    public function test_valid_consultation_request_is_stored(): void
    {
        $response = $this->post(route('contact.store'), [
            'name' => 'Ana Manuel',
            'company' => 'Empresa Exemplo',
            'sector' => 'banca',
            'phone' => '+244 900 000 000',
            'email' => 'ana@example.com',
            'message' => 'Precisamos de uma avaliação.',
        ]);

        $response->assertRedirect(route('contact'));

        $this->assertDatabaseHas('leads', [
            'name' => 'Ana Manuel',
            'company' => 'Empresa Exemplo',
            'status' => 'new',
        ]);
    }

    public function test_required_contact_fields_are_validated(): void
    {
        $this->post(route('contact.store'), [])
            ->assertSessionHasErrors(['name', 'company', 'sector', 'phone']);
    }
}
