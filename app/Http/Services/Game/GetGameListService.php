<?php

namespace App\Http\Services\Game;

use App\Models\Game;
use Illuminate\Database\Eloquent\Builder;

class GetGameListService
{
    public function getList(?int $perPage, $ratingFrom = null, $ratingTo = null)
    {
        return Game::with('genres')
            ->when($ratingFrom, fn(Builder $q) => $q->where('rating', '>=', $ratingFrom))
            ->when($ratingTo, fn(Builder $q) => $q->where('rating', '<=', $ratingTo))
            ->orderBy('id', 'desc')
            ->paginate($perPage);
    }
}
