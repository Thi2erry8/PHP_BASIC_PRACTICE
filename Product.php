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

    public function calculateShipping(): int {
      return 0 ;
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

    public function calculateShipping(): int {
      return 10 ;
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

    public function calculateShipping(): int {
      return 0 ;
    }
}

$products = [
    new PhysicalProduct("PS5", 500, 3.5),
    new DigitalProduct("PHP Course", 50, 250),
    new PhysicalProduct("Xbox", 450, 4.0)
];

foreach ($products as $product) {
    echo $product->getCategory();
    echo " - Livraison : ";
    echo $product->calculateShipping();
    echo "<br>";
}