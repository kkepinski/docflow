<?php
namespace DocFlow\NumberGenerator;

use DocFlow\NumberGenerator;

class QEPNumberGenerator implements NumberGenerator
{

    function generateNumber(DocumentType $type)
    {
        $name = $type->getName();
    
        return '1111-QEP-2222' . $name;
    }

    public function getValue(){

        return $this->value;
    
    }
}