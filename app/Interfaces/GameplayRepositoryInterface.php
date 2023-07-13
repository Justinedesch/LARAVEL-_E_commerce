<?php

namespace App\Interfaces;

interface GameplayRepositoryInterface
{
    public function getAllGameplays();
    public function getGameplayById($gameplayId);
    public function deleteGameplay($gameplayId);
    public function createGameplay(array $gameplayDetails);
    public function updateGameplay($gameplayId, array $newDetails);
}
