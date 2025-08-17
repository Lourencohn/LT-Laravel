<?php

namespace Database\Seeders;

use App\Models\Developer;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeveloperSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        
        foreach ($users as $user) {
            Developer::factory(fake()->numberBetween(3, 8))->create([
                'user_id' => $user->id,
            ]);
        }
    }
}