<?php

namespace App\Http\Controllers;

use App\Http\Requests\Game\StoreGameRequest;
use App\Http\Requests\Game\UpdateGameRequest;
use App\Http\Services\Game\GetGameListService;
use App\Models\Game;
use App\OpenApi\Parameters\Game\ListGameParameters;
use App\OpenApi\RequestBodies\Game\StoreGameRequestBody;
use App\OpenApi\Responses\Game\GameResponse;
use App\OpenApi\Responses\Game\ListGameResponse;
use Illuminate\Http\Request;
use Vyuldashev\LaravelOpenApi\Attributes as OpenApi;

#[OpenApi\PathItem]
class GameController extends Controller
{
    /**
     * List of games.
     */
    #[OpenApi\Operation(tags: ['Games'])]
    #[OpenApi\Parameters(ListGameParameters::class)]
    #[OpenApi\Response(ListGameResponse::class)]
    public function index(
        GetGameListService $gameListService,
        Request            $request
    )
    {
        return $gameListService->getList(
            $request->input('per-page'),
            $request->input('rating_from'),
            $request->input('rating_to')
        );
    }

    /**
     * Create a game.
     */
    #[OpenApi\Operation(tags: ['Games'], method: 'POST')]
    #[OpenApi\RequestBody(StoreGameRequestBody::class)]
    #[OpenApi\Response(GameResponse::class)]
    public function store(StoreGameRequest $request)
    {
        /** @var Game $game */
        $game = Game::create($request->except('genres'));

        $game->genres()->attach($request->validated('genres'));

        $game->load('genres');

        return $game;
    }

    /**
     * Show a game.
     */
    #[OpenApi\Operation(tags: ['Games'])]
    #[OpenApi\Response(GameResponse::class)]
    public function show(Game $game)
    {
        $game->load('genres');

        return $game;
    }

    /**
     * Update a game.
     */
    #[OpenApi\Operation(tags: ['Games'])]
    #[OpenApi\RequestBody(StoreGameRequestBody::class)]
    #[OpenApi\Response(GameResponse::class)]
    public function update(UpdateGameRequest $request, Game $game)
    {
        $game->update($request->except('genres'));

        if ($request->has('genres')) {
            $game->genres()->sync($request->input('genres'));
        }

        $game->load('genres');

        return $game;
    }

    /**
     * Remove a game.
     */
    #[OpenApi\Operation(tags: ['Games'])]
    #[OpenApi\Response(GameResponse::class)]
    public function destroy(Game $game)
    {
        $game->delete();

        $game->load('genres');

        return $game;
    }
}
