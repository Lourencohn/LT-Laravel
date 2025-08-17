<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Developer;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        
        foreach ($users as $user) {
            $developers = Developer::where('user_id', $user->id)->get();
            
            if ($developers->count() > 0) {
                $articles = Article::factory(fake()->numberBetween(2, 6))->create([
                    'user_id' => $user->id,
                ]);
                
                foreach ($articles as $article) {
                    $selectedDevelopers = $developers->random(fake()->numberBetween(1, min(3, $developers->count())));
                    $article->developers()->attach($selectedDevelopers->pluck('id'));
                }
            }
        }
    }
}