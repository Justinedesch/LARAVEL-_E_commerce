<?php

namespace App\Repositories;

use App\Interfaces\CommandRepositoryInterface;
use App\Models\Command;

class CommandRepository implements CommandRepositoryInterface
{

    public function getAllCommands()
    {
        return Command::orderBy('id', 'desc')->get();
    }

    public function getCommandtByUserId($userId)
    {
        return Command::where('user_id',$userId)->orderBy('id', 'desc')->get();
    }

    public function deleteCommand($orderId): void
    {
        Command::destroy($orderId);
    }

    public function createCommand(array $orderDetails)
    {
        return Command::create($orderDetails);
    }

    public function getCommandtById($orderId)
    {
        return Command::find($orderId);
    }
}
