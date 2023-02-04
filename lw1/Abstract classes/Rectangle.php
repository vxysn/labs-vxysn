<?php

require_once("Shape.php");

abstract class Rectangle extends Shape
{
    private float $first, $second;

    function __construct(float $var1, float $var2)
    {
        $this->first = $var1;
        $this->second = $var2;
        if ($this->first <= 0 || $this->second <= 0) {
            throw new Exception("Неправильные значения размеров");
        }
    }

    public function getPerimeter(): float
    {
        return ($this->first + $this->second) * 2;
    }

    public function getArea(): float
    {
        return $this->first * $this->second;
    }
}
