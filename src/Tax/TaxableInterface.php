<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Ris\Tax;

/**
 * Tax eligible transaction
 * 
 * @author Lim Afriyadi <lim.afriyadi@rajawalisoftware.com>
 */
interface TaxableInterface
{
    /**
     * Get base amount (for tax calculation)
     * 
     * @return float
     */
    public function getTaxableAmount();
    /**
     * Set tax amount
     * 
     * @param float $amount Tax amount
     */
    public function setTaxAmount($amount);
}