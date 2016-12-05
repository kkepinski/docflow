<?php

namespace DocFlow\Domain\User;

use Ramsey\Uuid\Uuid;

class User
{
    private $id;
    private $name;

    /**
     * User constructor.
     * @param $id
     * @param $name
     */
    public function __construct(Uuid $id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }
}

