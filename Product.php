<?php


interface Payable{
  public function pay( float $amount): float;
}

abstract class Payment implements Payable{
  protected float $feeRate;

  public function __construct(float $feeRate)
  {
    $this->feeRate = $feeRate;
  }

  abstract public function getPaymentType(): string;
}


class CreditCardPayment extends Payment{
    
    
    public function __construct(float $feeRate)
    {
      parent::__construct($feeRate);
    }

    public function getPaymentType(): string{
      return "Credit Card";
    }

    public function pay( float $amount): float{
      return $this->feeRate * $amount;
    }

}

class PayPalPayment extends Payment{
    
    
    public function __construct(float $feeRate)
    {
      parent::__construct($feeRate);
    }

    public function getPaymentType(): string{
      return "Credit Card";
    }

    public function pay( float $amount): float{
      return $this->feeRate * $amount;
    }

}

$payments = [
    new CreditCardPayment(0.02),
    new PayPalPayment(0.03)
];