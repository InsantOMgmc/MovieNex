<?php

class Library
{
    private $film;
    private $totalPrice;

    public function __construct($film)
    {
        $this->film = $film;
        $this->totalPrice = $film['price'];
    }
}