<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Ris\Tax\Calculator;

/**
 * 10% Value added tax
 *
 * @author Lim Afriyadi <lim.afriyadi@rajawalisoftware.com>
 */
final class Vat10Calculator
{
    /**
     * {@inheritdoc}
     */
    public function calculate($amount)
    {
        return $amount *= 0.1;
    }
}