<?php
namespace DocFlow\Domain;

use DocFlow\Domain\Document\Document;
use Money\Money;

interface PriceCalculator {
    
    public function calculate(Document $doc, \DocFlow\Domain\Money $money) ;
    
}