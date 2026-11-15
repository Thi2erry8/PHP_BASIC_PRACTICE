<?php

class Product
{
    private string $name;
    private float $price;
    private int $quantity;

    public function __construct(string $name, float $price, int $quantity = 0)
    {
        $this->setName($name);
        $this->setPrice($price);
        $this->setQuantity($quantity);
    }

    /*name*/
    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        if ($name === '') {
            throw new InvalidArgumentException("Name can't be empty");
        }
        $this->name = $name;
    }

    /*price*/
    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price): void
    {
        if ($price < 0) {
            throw new InvalidArgumentException("Price can't be negative");
        }
        $this->price = $price;
    }

    /*quantity*/
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): void
    {
        if ($quantity < 0) {
            throw new InvalidArgumentException("Quantity can't be negative");
        }
        $this->quantity = $quantity;
    }

}