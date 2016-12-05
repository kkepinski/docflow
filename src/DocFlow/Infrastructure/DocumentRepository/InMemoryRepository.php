<?php

namespace DocFlow\Infrastructure\DocumentRepository;

use DocFlow\Domain\Document\Document;
use DocFlow\Domain\Document\DocumentNumber;
use DocFlow\Infrastructure\DocumentRepository;

class InMemoryRepository implements DocumentRepository
{
    private $documents = [];

    public function load(DocumentNumber $number)
    {
        return $this->documents[$number->getValue()];
    }

    public function save(Document $document)
    {
        $this->documents[$document->getNumber()->getValue()] = $document;
    }
}