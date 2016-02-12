<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Ris\Tax;

/**
 * Tax processor interface
 * 
 * @author Lim Afriyadi <lim.afriyadi@rajawalisoftware.com>
 */
interface TaxProcessorInterface
{
    /**
     * Collect tax from $taxable with registered collectors
     * 
     * @param \Ris\Tax\TaxableInterface $taxable
     * @return TaxableInterface
     */
    public function process(TaxableInterface $taxable);
    /**
     * Add a tax collector
     * 
     * @param \Ris\Tax\TaxCollectorInterface $collector
     */
    public function addCollector(TaxCollectorInterface $collector);
    /**
     * Get tax collectors
     * 
     * @return array Array of TaxCollectorInterface
     */
    public function getCollectors();
}