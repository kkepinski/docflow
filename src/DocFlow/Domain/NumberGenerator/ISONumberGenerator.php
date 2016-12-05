<?php
namespace DocFlow\Domain\NumberGenerator;

use DocFlow\Domain\Document\DocumentNumber;
use DocFlow\Domain\Document\DocumentType;
use DocFlow\NumberGenerator;

class ISONumberGenerator implements \DocFlow\Domain\NumberGenerator
{

    function generateNumber(DocumentType $type)
    {
        $name = $type->getName();

        $value = '1111-XX-2222' . $name;
        
        return new DocumentNumber($value);
    }
    
}