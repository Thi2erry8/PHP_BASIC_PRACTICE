<?php

use Uri\InvalidUriException;

class Product {

    private float $price; 
    private int $quantity;

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

    public function getQuantity():int{
       return $this->quantity ;
    }

    public function setQuantity(int $quantity):void{
        if($quantity < 0){
        throw new InvalidArgumentException("Quantity Can't be negatif");
    };
    $this->quantity = $quantity;
    
    }
}

$product = new Product(500);

echo $product->getPrice() . "<br>";

// Modification
$product->setPrice(750);

echo $product->getPrice();

// Tentative invalide
$product->setPrice(-100);