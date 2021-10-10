<?php

namespace FluentAPI;

class MathService
{
    private float $value = 0;
    
    public function add($value) : object
    {
        $this->value += $value;
        return $this;
    }

    public function subtract($value) : object
    {
        $this->value -= $value;
        return $this;
    }

    public function multiply($value) : object
    {
        $this->value *= $value;
        return $this;
    }

    public function divide($value) : object
    {
        if($value === 0) {
            throw new \Exception('Division by zero is not allowed');
        }
        $this->value /= $value;
        return $this;
    }

    public function get() : float
    {
        return $this->value;
    }
}