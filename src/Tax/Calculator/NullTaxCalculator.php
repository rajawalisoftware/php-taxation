<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Ris\Tax\Calculator;

use Ris\Tax\TaxCalculatorInterface;

/**
 * Zero tax calculator
 *
 * @author Lim Afriyadi <lim.afriyadi@rajawalisoftware.com>
 */
final class NullTaxCalculator implements TaxCalculatorInterface
{
    /**
     * {@inheritdoc}
     */
    public function calculate($amount)
    {
        return 0;
    }
}