<?php

namespace App\Services\Game;

use App\Models\Game;

class ShowGameService
{
    public function show(Game $game)
    {
        $game->load('genres');

        return $game;
    }
}
