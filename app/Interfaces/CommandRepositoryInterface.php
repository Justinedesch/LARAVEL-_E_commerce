<?php

namespace App\Interfaces;

interface CommandRepositoryInterface
{
    public function getAllCommands();
    public function getCommandtById($userId);
    public function getCommandtByUserId($userId);
    public function deleteCommand($orderId);
    public function createCommand(array $orderDetails);
}
