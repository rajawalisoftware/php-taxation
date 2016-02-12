<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Ris\Tax;

/**
 * Tax amount calculator
 * 
 * @author Lim Afriyadi <lim.afriyadi@rajawalisoftware.com>
 */
interface TaxCalculatorInterface
{
    /**
     * Calculate tax amount based on $amount
     * 
     * @param float $amount
     * @return float
     */
    public function calculate($amount);
}