<?php


interface Payable{
  public function pay( float $amount): string;
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

    public function pay( float $amount): string{
      
      $total = $amount + ($this->feeRate * $amount);

      return $this->getPaymentType() . ": " . number_format($total, 2);
    }

}

class PayPalPayment extends Payment{
    
    
    public function __construct(float $feeRate)
    {
      parent::__construct($feeRate);
    }

    public function getPaymentType(): string{
      return "Paypal";
    }

    public function pay( float $amount): string{
      
      $total = $amount + ($this->feeRate * $amount);

      return $this->getPaymentType() . ": " . number_format($total, 2);
    }

}

$payments = [
    new CreditCardPayment(0.02),
    new PayPalPayment(0.03)
];

foreach($payments as $payment){
  echo $payment->pay(100) . "<br>" ;
}