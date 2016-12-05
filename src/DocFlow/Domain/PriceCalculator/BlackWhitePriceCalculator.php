<?php
namespace DocFlow\Domain\PriceCalculator;

use DocFlow\Domain\PriceCalculator;
use DocFlow\Domain\Document\Document;
use DocFlow\Domain\Money;

class BlackWhitePriceCalculator implements PriceCalculator
{

    public function calculate(Document $doc, Money $money)
    {
        $val = $money->getValue() * $doc->getSitesNumber();
        $priceMoney  = clone $money;
        $priceMoney->setValue($val);

        return $priceMoney;
    }
}