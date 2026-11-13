<?php

    class Product{

       public string $name;
       public float $price;
       public int $quantity;

       public function ShowDetails():void{
         echo "Nom :" . $this->name;
         echo "<br>Price :" . $this->price;
         echo "<br>Quantity :" . $this->quantity;
       }

       public function calculateTotal(){
          return $this->price * $this->quantity;
       }
    }


    $Product1 = new Product();
    
    $Product1->name = "PS4";
    $Product1->price = 450.50;
    $Product1->quantity = 3;

    $Product1->ShowDetails();
    echo "<br>Total : " . $Product1->calculateTotal();

    echo "<hr>";

    $Product2 = new Product();
    
    $Product2->name = "XBOX ONE";
    $Product2->price = 550.50;
    $Product2->quantity = 8;

    $Product2->ShowDetails();
    echo "<br>Total : " . $Product2->calculateTotal();