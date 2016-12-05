<?php

namespace DocFlow\Infrastructure\UserRepository;

use DocFlow\Domain\User\User;
use DocFlow\Infrastructure\UserRepository;
use Ramsey\Uuid\Uuid;

class InMemoryRepository implements UserRepository
{
    private $users = [];

    public function load(Uuid $id)
    {
        return $this->users[(string)$id];
    }

    public function save(User $user)
    {
        $this->users[(string)$user->getId()] = $user;
    }
}