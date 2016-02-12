<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Ris\Tax;

/**
 * Tax system interface
 * 
 * @author Lim Afriyadi <lim.afriyadi@rajawalisoftware.com>
 */
interface TaxInterface
{
    /**
     * Get tax name
     * 
     * @return string
     */
    public function getName();
    /**
     * Tax description
     * 
     * @return string
     */
    public function getDescription();
    /**
     * Get tax calculator
     * 
     * @return TaxCalculatorInterface
     */
    public function getCalculator();
    /**
     * Get discounted amount from tax base on $amount
     * 
     * @return float
     */
    public function getTaxDiscount($amount);
}