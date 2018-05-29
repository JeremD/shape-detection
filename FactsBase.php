<?php
/**
 * Created by PhpStorm.
 * User: momomo
 * Date: 21/05/2018
 * Time: 19:37
 */

class FactsBase
{
    private $facts = array();

    public function __construct($factsBase = []) {
        foreach($factsBase as $key => $fact) {
            if($key === 'sides') {
                array_push($this->facts, new Fact($key, $fact));
            } else {
                array_push($this->facts, new Fact($key, $fact));
            }
        }
    }

    public function getFacts() {
        return $this->facts;
    }

    public function addFact($name, $value) {
        array_unshift($this->facts, new Fact($name, $value));
    }

    public function addFactToEnd($name, $value) {
        array_push($this->facts, new Fact($name, $value));
    }

    public function removeFact($index) {
        unset($this->facts[$index]);
    }

    public function removeFactWithPremisse($premisse) {
        foreach($this->facts as $key => $fact) {
            if($fact->getName() === $premisse) {
                unset($this->facts[$key]);
            }
        }

        return $this->facts;
    }

    public function removeFactWithPremisses($premisses) {
        $indexFacts = 0;
        $indexPremisses = 0;

        while($indexFacts < sizeof($this->facts)) {
            if($this->facts[$indexFacts]->getName() === $premisses[$indexPremisses]) {
                unset($this->facts[$indexFacts]);
                $indexPremisses++;
                $indexFacts++;
            } else {
                $indexFacts++;
            }
        }

        return $this->facts;
    }

    public function setFacts($facts) {
        $this->facts = $facts;

        return $this->facts;
    }

    public function getFinalFacts($usedFacts) {
        $intermediateShapes = false;

        foreach($usedFacts as $key => $fact) {
            if($intermediateShapes) {
                unset($usedFacts[$key]);
            }
            if(is_bool($fact->getValue()) && !$intermediateShapes) {
                $intermediateShapes = true;
            }
        }

        return $usedFacts;
    }
}