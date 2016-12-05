<?php
namespace DocFlow\Domain;

class USDMoney implements \Money {
    
    private $value;
    private $format;
    private $symbol;
    
    
    public function __construct() {

        $this->symbol = "$";
    }
    
    public function getValue() {
        
        return $value;
    }

    public function setValue($value)
    {
        $this->value = $value;
    }
}