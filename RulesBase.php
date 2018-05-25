<?php
/**
 * Created by PhpStorm.
 * User: momomo
 * Date: 21/05/2018
 * Time: 19:37
 */

include_once 'Rule.php';

class RulesBase
{
    private $rules = array();

    public function __construct() {

    }

    public function makeRule($ruleName, $rulePremisses, $ruleConclusion) {
        array_push($this->rules, new Rule($ruleName, $rulePremisses, $ruleConclusion));
    }

    public function getRules() {
        return $this->rules;
    }
}