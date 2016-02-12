<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Ris\Tax\Collector;

use Ris\Tax\TaxCollectorInterface;
use Ris\Tax\TaxableInterface;
use Ris\Tax\TaxInterface;

/**
 * Standard tax collector
 *
 * @author Lim Afriyadi <lim.afriyadi@rajawalisoftware.com>
 */
class DefaultTaxCollector implements TaxCollectorInterface
{
    /**
     * @var TaxInterface
     */
    protected $tax;
    /**
     * @param TaxInterface $tax
     * @return \Ris\Tax\Collector\DefaultTaxCollector
     */
    public function __construct(TaxInterface $tax)
    {
        $this->tax = $tax;
        
        return $this;
    }
    /**
     * {@inheritdoc}
     */
    public function getTax()
    {
        return $this->tax;
    }
    /**
     * {@inheritdoc}
     */
    public function collect(TaxableInterface $taxable)
    {
        $amount   = $taxable->getTaxableAmount();
        $discount = $this->tax->getTaxDiscount($amount);
        
        return $this->getTax()->getCalculator()->calculate($amount - $discount);
    }
}