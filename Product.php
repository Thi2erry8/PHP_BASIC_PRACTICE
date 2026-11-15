<?php

class Product {

    private float $price;

    public function __construct(float $price) {
       
        $this->setPrice($price);
       
    }

    public function getPrice():float {
        return $this->price;
    }

    public function setPrice(float $price): void {
         if($price < 0 ){
          throw new InvalidArgumentException("Price can't be negatif");
        }

        $this->price = $price ;
    }
}