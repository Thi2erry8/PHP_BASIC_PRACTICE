<?php

    class Product{

       public string $name;
       public float $price;
       public int $quantity;

       public function __construct(string $name , float $price , int $quantity)
       {
          $this->name = $name;
          $this->price = $price;
          $this->quantity = $quantity;

       }

       public function ShowDetails():void{
         echo "Nom :" . $this->name;
         echo "<br>Price :" . $this->price;
         echo "<br>Quantity :" . $this->quantity;
       }

       public function calculateTotal():float{
          return $this->price * $this->quantity;
       }
    }


    $Product1 = new Product("PS5",499.99,5);
    $Product2 = new Product("Xbox One",350.50,3);
    $Product3 = new Product("Nintendo Switch",299.99,7);