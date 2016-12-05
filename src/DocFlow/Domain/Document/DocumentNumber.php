<?php

namespace DocFlow\Domain\Document;

class DocumentNumber
{
    private $number;

    public function __construct($number)
    {
        $this->number = $number;
    }

    public function __toString()
    {
        return $this->number;
    }

    public function getValue(){
        return $this->number;
    }

}