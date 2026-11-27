<?php


interface Payable{
  public function calculateTotal(): float;
}

abstract class Product implements Payable
{
    protected string $name;
    protected float  $price;
    protected int  $quantity;

    public function __construct(string $name, float $price ,int  $quantity){
        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
        
    }

    public function getPrice(): float {
        return $this->price;
    }
    
    public function calculateTotal(): float
    {
      return $this->price * $this->quantity;
    }

    abstract public function getCategory(): string;

    abstract public function calculateShipping(): float ;

}

class PhysicalProduct extends Product {

   protected float $weight;

   public function __construct(string $name,float $price, int $quantity ,float $weight) {
   
     parent::__construct($name, $price, $quantity);
   
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

    public function calculateShipping(): float {
      return 10.0 ;
    }
}

class DigitalProduct extends Product {

   protected float $fileSize;

   public function __construct(string $name,float $price, int $quantity,float $fileSize) {
    
     parent::__construct($name, $price , $quantity);

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

    public function calculateShipping(): float {
      return 0.0 ;
    }
}

$products = [
    new PhysicalProduct("PS5", 500, 12,3.5),
    new DigitalProduct("PHP Course", 23,50, 250)
];

foreach ($products as $product) {
    echo $product->calculateTotal() . "<br>" ;
}