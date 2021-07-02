<?php


namespace App\Entity;


class Vat
{
    private $rate = 20.0;

    public function __construct($rate) {
        $this->rate = $rate;
    }

    public function getRate() : float {
        return $this->rate;
    }
}