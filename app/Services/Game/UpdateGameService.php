<?php

namespace App\Services\Game;

use App\Http\Requests\Game\UpdateGameRequest;
use App\Models\Game;

class UpdateGameService
{
    public function update(UpdateGameRequest $request, Game $game)
    {
        $game->update($request->except('genres'));

        if ($request->has('genres')) {
            $game->genres()->sync($request->input('genres'));
        }

        $game->load('genres');

        return $game;
    }
}
