<?php
namespace DocFlow\Infrastructure;

use DocFlow\Domain\User\User;
use Ramsey\Uuid\Uuid;

interface UserRepository
{
    public function load(Uuid $id);

    public function save(User $user);
}