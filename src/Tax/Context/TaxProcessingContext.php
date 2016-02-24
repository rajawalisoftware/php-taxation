<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Ris\Tax\Context;

use LLA\Dci\AbstractContext;

/**
 * Description of TaxProcessingContext
 *
 * @author Lim Afriyadi <lim.afriyadi@rajawalisoftware.com>
 */
class TaxProcessingContext extends AbstractContext
{
    /**
     * @var \Ris\Tax\TaxProcessorInterface
     */
    private $processor;
    /**
     * @var \Ris\Tax\TaxInterface
     */
    private $tax;
    /**
     * @var \Ris\Tax\TaxCollectorInterface
     */
    private $collector;
    /**
     * @var \Ris\Tax\TaxableInterface
     */
    private $taxable;
    
    public function execute()
    {
        if($this->collector->getTax() !== $this->tax) {
            $this->collector->setTax($this->tax);
        }
        $this->processor
            ->addCollector($this->collector)
            ->process($this->taxable);
    }
}