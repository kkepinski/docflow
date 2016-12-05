<?php

namespace DocFlow\Infrastructure\UserRepository;

use DocFlow\Domain\User\User;
use DocFlow\Infrastructure\UserRepository;
use Ramsey\Uuid\Uuid;

class PDORepository implements UserRepository
{
    private $pdo;

    /**
     * PDORepository constructor.
     * @param $pdo
     */
    public function __construct(\PDO$pdo)
    {
        $this->pdo = $pdo;
    }


    public function load(Uuid $id)
    {
        //
    }

    public function save(User $user)
    {
        ///
    }
}