<?php

namespace Tests\Feature;

use App\Filament\Pages\Auth\EditProfile;
use App\Models\Project;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Livewire;
use Tests\TestCase;

class ProjectListingTest extends TestCase
{
    public function test_home_lists_only_published_projects_in_order(): void
    {
        Project::query()->create([
            'title' => 'Projet masqué',
            'description' => 'Ne doit pas apparaître.',
            'tech_stack' => ['PHP'],
            'order' => 1,
            'is_published' => false,
            'status' => 'archived',
        ]);

        Project::query()->create([
            'title' => 'Second publié',
            'description' => 'Affiché en second.',
            'tech_stack' => ['MySQL'],
            'order' => 2,
            'is_published' => true,
            'status' => 'testing',
            'github_url' => 'https://github.com/Narcisse006/forum',
        ]);

        Project::query()->create([
            'title' => 'Premier publié',
            'description' => 'Affiché en premier.',
            'tech_stack' => ['Laravel'],
            'order' => 1,
            'is_published' => true,
            'status' => 'online',
            'url' => 'https://example.com/demo',
            'image' => 'images/stock.jpg',
            'gallery' => ['images/stock.jpg', 'images/profile/Nessi.webp'],
        ]);

        $response = $this->get(route('home'));

        $response->assertOk();
        $response->assertSeeInOrder(['Premier publié', 'Second publié']);
        $response->assertDontSee('Projet masqué');
        $response->assertSee('En ligne');
        $response->assertSee('En test');
        $response->assertSee('En ligne');
        $response->assertSee('GitHub');
        $response->assertSee('shell-project__overlay-btn', false);
        $response->assertSee('fa-plus', false);
        $response->assertSee('shell-project__gallery-item', false);
        $response->assertDontSee('data-project-tilt');
        $response->assertSee('https://example.com/demo', false);
    }

    public function test_admin_login_page_is_available(): void
    {
        $this->get('/admin/login')->assertOk();
    }

    public function test_admin_dashboard_renders_for_the_authenticated_user(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->get('/admin')
            ->assertOk()
            ->assertSee('Narcisse OGOUDIKPE')
            ->assertSee('Projets publiés')
            ->assertSee('Messages non lus')
            ->assertSee('Derniers messages')
            ->assertSee('Projets récents')
            ->assertSee('Voir le portfolio');
    }

    public function test_profile_page_shows_account_and_can_update_it(): void
    {
        $user = User::factory()->create([
            'name' => 'Narcisse OGOUDIKPE',
            'email' => 'narcisse@example.com',
        ]);

        $this->actingAs($user)
            ->get('/admin/profile')
            ->assertOk()
            ->assertSee('Mon profil')
            ->assertSee('Voir le portfolio')
            ->assertSee('narcisse@example.com');

        Livewire::actingAs($user)
            ->test(EditProfile::class)
            ->fillForm([
                'name' => 'Narcisse Mis à jour',
                'email' => 'narcisse@example.com',
                'password' => 'NouveauMotDePasse1',
                'passwordConfirmation' => 'NouveauMotDePasse1',
            ])
            ->call('save')
            ->assertHasNoFormErrors();

        $user->refresh();

        $this->assertSame('Narcisse Mis à jour', $user->name);
        $this->assertTrue(Hash::check('NouveauMotDePasse1', $user->password));
    }
}
