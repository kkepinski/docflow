<?php

namespace DocFlow\Domain\Document;

use Esky\Enum\Enum;

class DocumentType extends Enum
{
    const QUALITY_BOOK = 1;
    const PROCEDURE_BOOK = 2;
    const INSTRUCTION = 3;

    public function __toString()
    {
        return (string)$this->getValue();
    }
}