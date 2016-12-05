<?php
use DocFlow\Domain\PrintType;

class ColorPrintType implements PrintType
{

    function countPrintCosts()
    {
        return 0.25;
    }
}