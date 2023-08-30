<?php

namespace Database\Seeders;

use App\Models\Game;
use App\Models\Genre;
use Illuminate\Database\Seeder;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genres = Genre::all();

        Game::factory()
            ->count(50)
            ->create()
            ->each(fn(Game $game) => $game->genres()->attach($genres->random(rand(1, 5))));
    }
}
