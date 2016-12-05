<?php
namespace DocFlow\Domain\Money;

class PLNMoney implements \DocFlow\Domain\Money
{

    private $value;

    private $format;

    private $symbol;

    public function __construct($value)
    {
        $this->setValue($value);
        $this->symbol = "z³";
    }

    public function getValue()
    {
        return $this->value;
    }

    public function setValue($value)
    {
        $this->value = $value;
    }
}