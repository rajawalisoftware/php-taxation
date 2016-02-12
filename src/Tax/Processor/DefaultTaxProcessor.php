<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Ris\Tax\Processor;

use Ris\Tax\TaxableInterface;
use Ris\Tax\TaxProcessorInterface;
use Ris\Tax\TaxCollectorInterface;

/**
 * Standard tax processor
 *
 * @author Lim Afriyadi <lim.afriyadi@rajawalisoftware.com>
 */
class DefaultTaxProcessor implements TaxProcessorInterface
{
    protected $collectors;
    /**
     * @param array $collectors Array of \Ris\Tax\TaxCollectorInterface
     */
    public function __construct(array $collectors = array())
    {
        $this->collectors = $collectors;
    }
    /**
     * {@inheritdoc}
     */
    public function process(TaxableInterface $taxable)
    {
        $taxAmount = 0;
        foreach($this->getCollectors() as $collector)
        {
            $taxAmount += $collector->collect($taxable);
        }
        $taxable->setTaxAmount($taxAmount);
        
        return $taxable;
    }
    /**
     * {@inheritdoc}
     */
    public function addCollector(TaxCollectorInterface $collector)
    {
        array_push($this->collectors, $collector);
        
        return $this;
    }
    /**
     * {@inheritdoc}
     */
    public function getCollectors()
    {
        return $this->collectors;
    }
}