<?php

namespace App\Services\Game;

use App\Http\Requests\Game\StoreGameRequest;
use App\Models\Game;

class CreateGameService
{
    public function create(StoreGameRequest $request)
    {
        /** @var Game $game */
        $game = Game::create($request->except('genres'));

        $game->genres()->attach($request->validated('genres'));

        $game->load('genres');

        return $game;
    }
}
