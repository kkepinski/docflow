<?php

namespace DocFlow\Domain;

interface PrintStrategy {
    
    const CONFIG = 'DEV';
    
    public function getStartegy();
    
    
}

