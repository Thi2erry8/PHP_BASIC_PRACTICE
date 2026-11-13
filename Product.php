<?php

    class Product{

       public string $name;
       public float $price;
       public int $quantity;

       public function ShowDetails(){
         echo "Nom :" . $this->name;
         echo "<br>Email :" . $this->price;
         echo "<br>Role :" . $this->quantity;
       }

       public function calculateTotal(){
         $total = $this->price * $this->quantity ;
         return $total ;
       }
    }