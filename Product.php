<?php

    class BankAccount
{
    private float $balance;

    public function __construct(float $balance)
    {
        $this->balance = $balance;
    }

    public function deposit(float $amount): void
    {   
        if($amount <= 0){
          throw new InvalidArgumentException("le doit etre superieur a zero");
        }

        $this->balance += $amount ;
    }

    public function withdraw(float $amount): void
    {   
        if($amount <= 0){
          throw new InvalidArgumentException("le doit etre superieur a zero");
        }elseif ($amount > $this->balance) {
          throw new InvalidArgumentException("Insufficient balance!");
        }
        
        $this->balance -= $amount;
    }
}