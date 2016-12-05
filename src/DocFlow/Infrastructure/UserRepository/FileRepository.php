<?php

namespace DocFlow\Infrastructure\UserRepository;

use DocFlow\Domain\User\User;
use DocFlow\Infrastructure\UserRepository;
use Gaufrette\Filesystem;
use Ramsey\Uuid\Uuid;

class FileRepository implements UserRepository
{
    private $users = [];
    private $filesystem;
    private $path;

    /**
     * FileRepository constructor.
     * @param Filesystem $filesystem
     * @param $path
     */
    public function __construct(Filesystem $filesystem, $path)
    {
        $this->filesystem = $filesystem;
        $this->path = $path;

        if (($this->filesystem->has($path))) {
            $this->users = unserialize($this->filesystem->read($this->path));
        }
    }

    public function load(Uuid $id)
    {
        return $this->users[(string)$id];
    }

    public function save(User $user)
    {
        $this->users[(string)$user->getId()] = $user;

        $this->filesystem->write($this->path, serialize($this->users), true);
    }
}