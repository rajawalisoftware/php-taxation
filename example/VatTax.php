<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once '../vendor/autoload.php';

use Ris\Tax\TaxInterface;
use Ris\Tax\TaxableInterface;
use Ris\Tax\Processor\DefaultTaxProcessor;
use Ris\Tax\Collector\DefaultTaxCollector;
use Ris\Tax\Calculator\Vat10Calculator;

class Vat10 implements TaxInterface
{
    public function getCalculator()
    {
        return new Vat10Calculator();
    }

    public function getDescription()
    {
        return '10% VAT';
    }

    public function getName()
    {
        return 'Value added tax';
    }

    public function getTaxDiscount($amount)
    {
        return 0;
    }

}

class Transaction implements TaxableInterface
{
    private $total;
    private $taxAmount;
    
    public function setTotal($total)
    {
        $this->total = $total;
        
        return $this;
    }
    
    public function getTaxableAmount()
    {
        return $this->total;
    }
    
    public function setTaxAmount($amount)
    {
        $this->taxAmount = $amount;
    }
    
    public function getGrandTotal()
    {
        return $this->taxAmount + $this->total;
    }
}

$transaction = new Transaction();
$transaction->setTotal(8181);
printf("Amount: %s\n", number_format($transaction->getTaxableAmount()));
$tax = new Vat10();
printf("Tax: %s\n", $tax->getName());
$collector = new DefaultTaxCollector($tax);
$processor = new DefaultTaxProcessor();
$processor->addCollector($collector);
$processor->process($transaction);
printf("Total with tax: %s\n", number_format($transaction->getGrandTotal()));