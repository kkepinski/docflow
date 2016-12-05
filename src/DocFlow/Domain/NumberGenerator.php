<?php

namespace DocFlow\Domain;


use DocFlow\Domain\Document\DocumentType;

interface NumberGenerator {

        public function generateNumber(DocumentType $type);
               
}