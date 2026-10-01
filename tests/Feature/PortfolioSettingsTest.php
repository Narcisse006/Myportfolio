<?php

namespace Tests\Feature;

use App\Models\PortfolioSetting;
use App\Models\User;
use Tests\TestCase;

class PortfolioSettingsTest extends TestCase
{
    public function test_home_falls_back_to_config_phones_without_settings_row(): void
    {
        PortfolioSetting::query()->delete();

        $response = $this->get(route('home'));

        $response->assertOk();
        $response->assertSee(config('portfolio.phone_bj.display'), false);
        $response->assertSee(config('portfolio.phone_bf.display'), false);
        $response->assertSee(config('portfolio.address'), false);
    }

    public function test_home_shows_database_settings_when_present(): void
    {
        PortfolioSetting::query()->create([
            'phone_bj' => '+229 00 11 22 33 44',
            'phone_bf' => '+226 55 66 77 88',
            'address' => 'Ouagadougou test',
            'whatsapp' => '+226 55 66 77 88',
        ]);

        $response = $this->get(route('home'));

        $response->assertOk();
        $response->assertSee('+229 00 11 22 33 44', false);
        $response->assertSee('+226 55 66 77 88', false);
        $response->assertSee('Ouagadougou test', false);
        $response->assertSee('wa.me/22655667788', false);
        $response->assertDontSee(config('portfolio.phone_bj.display'), false);
    }

    public function test_admin_settings_page_is_available_for_authenticated_user(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->get('/admin/portfolio-settings')
            ->assertOk()
            ->assertSee('Réglages de contact');
    }
}
