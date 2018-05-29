<?php
/**
 * Created by PhpStorm.
 * User: momomo
 * Date: 21/05/2018
 * Time: 19:37
 */

class Fact
{
    private $name;
    private $value;

    public function __construct($name, $value) {
        $this->name = $name;
        if(is_string($value)) {
            $value = intval($value);
        }
        $this->value = $value;
    }

    public function __is_equal(Rule $rule) {
        foreach($rule->getPremisses() as $key => $premisse) {
            if($key === $this->name && $premisse === $this->value) {
                return true;
            }
        }

        return false;
    }

    public function getName() {
        return $this->name;
    }

    public function getValue() {
        return $this->value;
    }
}