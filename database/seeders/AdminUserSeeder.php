<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        $email = env('ADMIN_EMAIL');
        $password = env('ADMIN_PASSWORD');

        if (blank($email) || blank($password)) {
            return;
        }

        if (User::query()->where('email', $email)->exists()) {
            return;
        }

        User::query()->create([
            'name' => env('ADMIN_NAME', 'Narcisse OGOUDIKPE'),
            'email' => $email,
            'password' => $password,
        ]);
    }
}
