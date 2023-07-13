<?php

namespace App\Repositories;

use App\Interfaces\GameplayRepositoryInterface;
use App\Models\Gameplay;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

class GameplayRepository implements GameplayRepositoryInterface
{

    public function getAllGameplays(): Collection
    {
        return Gameplay::orderBy('id', 'desc')->get();
    }

    public function getGameplayById($gameplayId)
    {
        return Gameplay::find($gameplayId);
    }

    public function deleteGameplay($gameplayId)
    {
        Gameplay::destroy($gameplayId);
    }

    public function createGameplay(array $gameplayDetails)
    {
        return Gameplay::create($gameplayDetails);
    }

    public function updateGameplay($gameplayId, array $newDetails)
    {
        return Gameplay::whereId($gameplayId)->update($newDetails);
    }
}
