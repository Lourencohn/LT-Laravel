<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // Criar usuário demo
        $demoUser = User::factory()->create([
            'name' => 'LT Cloud Demo',
            'email' => 'demo@ltcloud.com.br',
            'password' => 'password',
        ]);
        
        // Criar usuário adicional para testes
        $testUser = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password',
        ]);

        // Executar seeders
        $this->call([
            DeveloperSeeder::class,
            ArticleSeeder::class,
        ]);
    }
}
