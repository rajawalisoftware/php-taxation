<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Ris\Tax;

/**
 * Tax collector
 * 
 * @author Lim Afriyadi <lim.afriyadi@rajawalisoftware.com>
 */
interface TaxCollectorInterface
{
    /**
     * Collect tax amount
     * 
     * @param \Ris\Tax\TaxableInterface $taxable
     * @return float
     */
    public function collect(TaxableInterface $taxable);
    /**
     * Get tax
     * 
     * @return TaxInterface
     */
    public function getTax();
    /**
     * Set tax
     * 
     * @param \Ris\Tax\TaxInterface $tax
     * @return TaxCollectorInterface
     */
    public function setTax(TaxInterface $tax);
}