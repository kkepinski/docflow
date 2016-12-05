<?php
namespace DocFlow\Domain;

interface Money
{

    public function getValue();

    public function setValue($value);
}