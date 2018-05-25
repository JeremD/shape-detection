<?php
/**
 * Created by PhpStorm.
 * User: momomo
 * Date: 21/05/2018
 * Time: 19:37
 */

class Rule
{
    private $name = '';
    private $premisses = array();
    private $conclusion = '';

    public function __construct($ruleName, $rulePremisses, $ruleConclusion)
    {
        $this->name = $ruleName;
        $this->premisses[key($rulePremisses)] = array();
        foreach($rulePremisses as $premisse) {
            array_push($this->premisses[key($rulePremisses)], $premisse);
        }
        $this->conclusion = $ruleConclusion;
    }
}