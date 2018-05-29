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
        foreach($rulePremisses as $keyPremisses => $premisse) {
            $this->premisses[$keyPremisses] = $premisse;
        }
        $this->conclusion = $ruleConclusion;
    }

    public function getName() {
        return $this->name;
    }

    public function getPremisses() {
        return $this->premisses;
    }

    public function getConclusion() {
        return $this->conclusion;
    }
}