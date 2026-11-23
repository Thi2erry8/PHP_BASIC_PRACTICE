<?php

class Product
{
    protected string $name;
    protected float  $price;

    public function __construct(string $name, float $price){
        $this->name = $name;
        $this->price = $price;
    }

    public function getPrice(): float {
        return $this->price;
    }

}

class PhysicalProduct extends Product {

   protected float $weight;

   public function __construct(float $weight) {
    $this->weight = $weight;
   }

   public function showDetails(): void {
     echo"Nom : " . $this->name;
     echo "<br>Prix :" . $this->price;
     echo"<br>Poid :" . $this->weight;
   }
}

class DigitalProduct extends Product {

   protected float $fileSize;

   public function __construct(float $fileSize) {
    $this->fileSize = $fileSize;
   }

   public function showDetails(): void {
     echo"Nom : " . $this->name;
     echo "<br>Prix :" . $this->price;
     echo"<br>Size :" . $this->fileSize;
   }
}

$physical = new PhysicalProduct("PS5", 500, 3.5);

$digital = new DigitalProduct("PHP Course", 50, 250);

$physical->showDetails();
$digital->showDetails();