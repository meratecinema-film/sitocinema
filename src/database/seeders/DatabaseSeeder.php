<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        /* User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        */

        User::firstOrCreate(
            ['email' => 'meratecinema@gmail.com'],
            [
                'name' => 'Administrator',
                'password' => Hash::make('BulloNoGrazie'), // Cambia questa password prima di andare in produzione
            ]
        );
    }
}
