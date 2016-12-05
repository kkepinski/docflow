<?php

namespace DocFlow\Infrastructure;

use DocFlow\Domain\Document\Document;
use DocFlow\Domain\Document\DocumentNumber;

interface DocumentRepository
{
    public function load(DocumentNumber $number);

    public function save(Document $document);
}