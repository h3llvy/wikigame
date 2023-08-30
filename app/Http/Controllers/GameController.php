<?php

namespace App\Http\Controllers;

use App\Http\Requests\Game\StoreGameRequest;
use App\Http\Requests\Game\UpdateGameRequest;
use App\Models\Game;
use App\OpenApi\Parameters\Game\ListGameParameters;
use App\OpenApi\RequestBodies\Game\StoreGameRequestBody;
use App\OpenApi\Responses\Game\GameResponse;
use App\OpenApi\Responses\Game\ListGameResponse;
use App\Services\Game\CreateGameService;
use App\Services\Game\DeleteGameService;
use App\Services\Game\GetGameListService;
use App\Services\Game\ShowGameService;
use App\Services\Game\UpdateGameService;
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
        GetGameListService $service,
        Request            $request
    )
    {
        return $service->getList(
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
    public function store(CreateGameService $service, StoreGameRequest $request)
    {
        return $service->create($request);
    }

    /**
     * Show a game.
     */
    #[OpenApi\Operation(tags: ['Games'])]
    #[OpenApi\Response(GameResponse::class)]
    public function show(ShowGameService $service, Game $game)
    {
        return $service->show($game);
    }

    /**
     * Update a game.
     */
    #[OpenApi\Operation(tags: ['Games'])]
    #[OpenApi\RequestBody(StoreGameRequestBody::class)]
    #[OpenApi\Response(GameResponse::class)]
    public function update(
        UpdateGameService $service,
        UpdateGameRequest $request,
        Game              $game
    )
    {
        return $service->update($request, $game);
    }

    /**
     * Remove a game.
     */
    #[OpenApi\Operation(tags: ['Games'])]
    #[OpenApi\Response(GameResponse::class)]
    public function destroy(DeleteGameService $service, Game $game)
    {
        return $service->delete($game);
    }
}
