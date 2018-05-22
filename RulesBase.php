<?php
/**
 * Created by PhpStorm.
 * User: momomo
 * Date: 21/05/2018
 * Time: 19:37
 */

include_once 'Rule.php';

class RulesBase implements JSONTraversable
{
    private $rules = array();

    public function __construct($jsonRules)
    {
        foreach($jsonRules as $jsonRule) {
            array_push($this->rules, new Rule($jsonRule));
        }
    }

    function getIterator()
    {
        return new ArrayIterator(($this->json));
    }

    function count()
    {
        return count($this->json);
    }
}