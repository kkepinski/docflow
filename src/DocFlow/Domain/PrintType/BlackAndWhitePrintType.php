<?php
use DocFlow\Domain\PrintType;

class BlackAndWhitePrintType implements PrintType
{

    function countPrintCosts()
    {
        return 0.1;
    }
}