<?php

namespace DocFlow\Infrastructure\DocumentRepository;

use DocFlow\Domain\Document\Document;
use DocFlow\Domain\Document\DocumentNumber;
use DocFlow\Infrastructure\DocumentRepository;
use Gaufrette\Filesystem;

class FileRepository implements DocumentRepository
{
    private $documents = [];
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

        if ($this->filesystem->has($this->path)) {
            $this->documents = unserialize($this->filesystem->read($this->path));
        }
    }

    public function load(DocumentNumber $number)
    {
        return $this->documents[(string)$number];
    }

    public function save(Document $document)
    {
        $this->documents[(string)$document->getNumber()] = $document;

        $this->filesystem->write($this->path, serialize($this->documents), true);
    }
}