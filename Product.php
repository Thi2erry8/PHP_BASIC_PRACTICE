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

    public function getCategory(): string
    {
        return "General Product";
    }

}

class PhysicalProduct extends Product {

   protected float $weight;

   public function __construct(string $name,float $price,float $weight) {
   
     parent::__construct($name, $price);
   
     $this->weight = $weight;
   }

   public function showDetails(): void {
     echo"Nom : " . $this->name;
     echo "<br>Prix :" . $this->price;
     echo"<br>Poid :" . $this->weight . "Kg";
   }

   public function getCategory(): string
    {
        return "Physical Product";
    }
}

class DigitalProduct extends Product {

   protected float $fileSize;

   public function __construct(string $name,float $price,float $fileSize) {
    
     parent::__construct($name, $price);

     $this->fileSize = $fileSize;
   }

   public function showDetails(): void {
     echo"Nom : " . $this->name;
     echo "<br>Prix :" . $this->price;
     echo"<br>Size :" . $this->fileSize . "Kb";
   }

   public function getCategory(): string
    {
        return "Digital Product";
    }
}

$physical = new PhysicalProduct("PS5", 500, 3.5);

$digital = new DigitalProduct("PHP Course", 50, 250);

$physical->showDetails();
$digital->showDetails();