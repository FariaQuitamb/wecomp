<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CmsAccessTest extends TestCase
{
    use RefreshDatabase;

    public function test_cms_routes_are_not_indexable(): void
    {
        $this->get('/admin/login')
            ->assertOk()
            ->assertHeader('X-Robots-Tag', 'noindex, nofollow, noarchive')
            ->assertSee('<meta name="robots" content="noindex, nofollow, noarchive">', false);
    }

    public function test_public_pages_remain_indexable(): void
    {
        $this->get('/')
            ->assertOk()
            ->assertHeaderMissing('X-Robots-Tag')
            ->assertDontSee('<meta name="robots" content="noindex, nofollow, noarchive">', false);
    }

    public function test_robots_txt_disallows_cms_routes(): void
    {
        $this->get('/robots.txt')
            ->assertOk()
            ->assertSee('Disallow: /admin');
    }

    public function test_cms_login_is_available_on_hosts_other_than_wecomp(): void
    {
        config(['session.domain' => '.wecomp.ao']);

        $response = $this->get('http://cms.internal.test/admin/login');

        $response
            ->assertOk()
            ->assertSee('Wecomp CMS');

        foreach ($response->headers->getCookies() as $cookie) {
            $this->assertNotSame('.wecomp.ao', $cookie->getDomain());
            $this->assertNotSame('wecomp.ao', $cookie->getDomain());
        }
    }

    public function test_authenticated_users_can_access_the_cms_outside_local(): void
    {
        config(['app.env' => 'production']);

        $user = User::factory()->create();

        $this->actingAs($user)
            ->get('/admin')
            ->assertOk();
    }
}
