<?php

namespace Tests\Feature;

use App\Models\User;
use Database\Seeders\AdminUserSeeder;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AdminUserSeederTest extends TestCase
{
    protected function tearDown(): void
    {
        $this->setAdminEnv(null, null, null);

        parent::tearDown();
    }

    public function test_seeder_creates_the_admin_once_and_keeps_a_changed_password(): void
    {
        $this->setAdminEnv('admin@example.com', 'MotDePasseInitial1!', 'Narcisse');

        $this->seed(AdminUserSeeder::class);

        $user = User::query()->where('email', 'admin@example.com')->first();
        $this->assertNotNull($user);
        $this->assertTrue(Hash::check('MotDePasseInitial1!', $user->password));

        $user->forceFill(['password' => 'MotDePasseChange1!'])->save();

        $this->seed(AdminUserSeeder::class);

        $user->refresh();
        $this->assertSame(1, User::query()->count());
        $this->assertTrue(Hash::check('MotDePasseChange1!', $user->password));
        $this->assertFalse(Hash::check('MotDePasseInitial1!', $user->password));
    }

    private function setAdminEnv(?string $email, ?string $password, ?string $name): void
    {
        foreach ([
            'ADMIN_EMAIL' => $email,
            'ADMIN_PASSWORD' => $password,
            'ADMIN_NAME' => $name,
        ] as $key => $value) {
            if ($value === null) {
                putenv($key);
                unset($_ENV[$key], $_SERVER[$key]);

                continue;
            }

            putenv($key.'='.$value);
            $_ENV[$key] = $value;
            $_SERVER[$key] = $value;
        }
    }
}
