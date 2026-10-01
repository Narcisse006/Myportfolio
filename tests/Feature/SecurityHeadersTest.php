<?php

namespace Tests\Feature;

use Tests\TestCase;

class SecurityHeadersTest extends TestCase
{
    public function test_public_pages_send_security_headers(): void
    {
        $home = $this->get(route('home'));
        $cv = $this->get(route('cv'));

        $home->assertOk();
        $cv->assertOk();

        foreach ([$home, $cv] as $response) {
            $response->assertHeader('X-Frame-Options', 'DENY');
            $response->assertHeader('X-Content-Type-Options', 'nosniff');
            $response->assertHeader('Referrer-Policy', 'strict-origin-when-cross-origin');
            $response->assertHeader('Permissions-Policy', 'camera=(), microphone=(), geolocation=()');
            $this->assertStringContainsString("frame-ancestors 'none'", (string) $response->headers->get('Content-Security-Policy'));
            $response->assertHeaderMissing('Strict-Transport-Security');
        }
    }

    public function test_admin_login_sends_security_headers(): void
    {
        $response = $this->get('/admin/login');

        $response->assertOk();
        $response->assertHeader('X-Frame-Options', 'DENY');
        $response->assertHeader('X-Content-Type-Options', 'nosniff');
    }

    public function test_https_response_sends_hsts(): void
    {
        $response = $this->get('https://portfolio.test/');

        $response->assertOk();
        $response->assertHeader('Strict-Transport-Security', 'max-age=31536000; includeSubDomains');
    }
}
