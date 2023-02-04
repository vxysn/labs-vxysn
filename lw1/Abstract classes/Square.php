<?php

require_once("Shape.php");

abstract class Square extends Shape
{
    private float $variable;

    function __construct(float $var)
    {
        if ($var <= 0) {
            throw new Exception("Неправильные значения размеров");
        }
        $this->variable = $var;
    }

    public function getPerimeter(): float
    {
        return $this->variable * 4;
    }
    public function getArea(): float
    {
        return $this->variable * $this->variable;
    }
}
