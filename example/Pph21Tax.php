<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once '../vendor/autoload.php';

use Ris\Tax\TaxInterface;
use Ris\Tax\TaxableInterface;
use Ris\Tax\TaxCalculatorInterface;
use Ris\Tax\Processor\DefaultTaxProcessor;
use Ris\Tax\Collector\DefaultTaxCollector;


class Pph21Calculator implements TaxCalculatorInterface
{
    public function calculate($amount)
    {
        return ($amount - $this->getPtkp()) * 0.25;
    }

    public function getPtkp()
    {
        return 60000000;
    }
    
    public function setStatus(Status $status)
    {
        
    }
}

class Pph21 implements TaxInterface
{
    public function getCalculator()
    {
        return new Pph21Calculator();
    }

    public function getDescription()
    {
        return 'Pajak penghasilan';
    }

    public function getName()
    {
        return 'Pph 21';
    }

    public function getTaxDiscount($amount)
    {
        return 60000000;
    }

}

class Salary implements TaxableInterface
{
    private $salary;
    private $tax;
    
    public function setSalary($salary)
    {
        $this->salary = $salary;
    }
    
    public function getTaxableAmount()
    {
        return $this->salary;
    }

    public function setTaxAmount($amount)
    {
        $this->tax = $amount;
    }

    public function getTaxAmount()
    {
        return $this->tax;
    }
}

$salary = new Salary();
$salary->setSalary(150000000);
printf("Amount: %s\n", number_format($salary->getTaxableAmount()));
$tax = new Pph21();
printf("Tax: %s\n", $tax->getName());
$collector = new DefaultTaxCollector($tax);
$processor = new DefaultTaxProcessor();
$processor->addCollector($collector);
$processor->process($salary);
printf("Total Pph21: %s\n", number_format($salary->getTaxAmount()));