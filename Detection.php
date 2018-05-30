<?php
/**
 * User: jerem
 * Date: 14/03/2018
 */

include_once 'JSONParser.php';
include_once 'RulesBase.php';
include_once 'FactsBase.php';
include_once 'Rule.php';
include_once 'Fact.php';

#TODO
// [DONE] populate FactsBase & Base
// [DONE] compare RulesBase & FactsBase
// output result (pop-in)

class Detection {
    private $rulesBase;
    private $factsBase;
    private $checkBase;
    private $inputs = [
        'sides' => null,
        'parallelSides' => null,
        'rightAngles' => null,
        'identicalSides' => null
    ];
    private $RESPONSE_MESSAGES = [
        'triangle'                          => [
            'text'  => "This is just a triangle",
            'img'   => "img/shapes/trq.jpg"
        ],
        'right-angled_triangle'             => [
            'text'  => "This is a right-angled triangle",
            'img'   => "img/shapes/trr.jpg"
        ],
        'isosceles_triangle'                => [
            'text'  => "This is a isosceles triangle",
            'img'   => "img/shapes/tri.jpg"
        ],
        'isosceles_right-angled_triangle'   => [
            'text'  => "This is right-angled isosceles triangle",
            'img'   => "img/shapes/trri.jpg"
        ],
        'equilateral'                       => [
            'text'  => "This is an equilateral rectangle",
            'img'   => "img/shapes/tre.jpg"
        ],
        'quadrilateral'                     => [
            'text'  => "This is just a quadrilateral",
            'img'   => "img/shapes/quq.jpg"
        ],
        'trapezium'                          => [
            'text'  => "This is a trapezium",
            'img'   => "img/shapes/tra.jpg"
        ],
        'parallelogram'                      => [
            'text'  => "This is a parallelogram",
            'img'   => "img/shapes/par.jpg"
        ],
        'diamond'                            => [
            'text'  => "This is a diamond",
            'img'   => "img/shapes/los.jpg"
        ],
        'rectangle'                          => [
            'text'  => "This is a rectangle",
            'img'   => "img/shapes/rec.jpg"
        ],
        'square'                             => [
            'text'  => "This is a square",
            'img'   => "img/shapes/car.jpg"
        ],
        'pentagone'                          => [
            'text'  => "This is just a pentagone",
            'img'   => "img/shapes/peq.jpg"
        ],
        'equilateral_pentagone'              => [
            'text'  => "This is an equilateral pentagone",
            'img'   => "img/shapes/pee.jpg"
        ],
        'err'                                => [
            'text'  => "This is non-sens...!",
            'img'   => "img/shapes/err.jpg"
        ]
    ];

    public function __construct($inputs, $url) {
        $this->rulesBase = new RulesBase();
        $json = file_get_contents($url);
        $jsonParser = new JSONParser($json, $this->rulesBase);

        try {
        $this->setInputs($inputs);
        } catch(Exception $e) {
            throw $e;
        }

        $this->factsBase = new FactsBase($this->inputs);
    }

    private function setInputs($inputs) {
        if(sizeof($inputs) !== sizeof($this->inputs)) {
            throw new Exception("The number of inputs seems to be wrong... Please try again ;-)");
        } else {
            $i = 0;
            foreach($this->inputs as $key => $input) {
                $this->inputs[$key] = $inputs[$i];
                $i++;
            }
        }
    }

    private function checkInconsistency($conclusion) {
        $erratic = false;

        foreach($this->checkBase->getFacts() as $key => $fact) {
            if($fact->getValue() !== 0 && !is_bool($fact->getValue())) {
                $erratic = true;
            }
        }

        if($erratic) {
            $erratic = false;
            $this->checkBase->addFact($conclusion, true);
            $newConclusion = $this->getCheckConclusion();

            if($conclusion !== $newConclusion) {
                $erratic = true;
            }
        }

        return $erratic;
    }

    public function detect() {
        $conclusion = $this->getConclusion();

        if($this->checkInconsistency($conclusion)) {
            $conclusion = "err";
        }

        return $conclusion;
    }

    public function getMessageDetection($conclusionCode) {
        return $this->RESPONSE_MESSAGES[$conclusionCode];
    }

    private function getCheckConclusion() {
        $facts = null;
        $indexRules = 0;
        $conclusion = "";
        $indexConclusion = null;
        $rules = $this->rulesBase->getRules();

        while ($indexRules < sizeof($rules)) {
            $verifiedPremisses = 0;
            $facts = $this->checkBase->getFacts();
            $indexFacts = 0;
            while ($indexFacts < sizeof($facts)) {
                $premisses = $rules[$indexRules]->getPremisses();
                foreach ($premisses as $keyPremisse => $premisse) {
                    if (isset($facts[$indexFacts])) {
                        if ($keyPremisse === $facts[$indexFacts]->getName()) {
                            if ($premisse === $facts[$indexFacts]->getValue()) {
                                $verifiedPremisses++;
                                if ($verifiedPremisses === sizeof($premisses)) {
                                    $conclusion = $rules[$indexRules]->getConclusion();
                                    break;
                                }
                            }
                        }
                    }
                }
                $indexFacts++;
            }
            $indexRules++;
        }

        return $conclusion;
    }

    private function getConclusion() {
        $facts = null;
        $indexRules = 0;
        $conclusion = "";
        $indexConclusion = null;
        $rules = $this->rulesBase->getRules();
        $this->checkBase = clone $this->factsBase;

        while($indexRules < sizeof($rules)) {
            $indexFacts = 0;
            $verifiedPremisses = 0;
            $facts = $this->factsBase->getFacts();
            $checkFacts = $this->factsBase->getFacts();
            while ($indexFacts < sizeof($facts)) {
                $premisses = $rules[$indexRules]->getPremisses();
                $checkPremisses = array();
                foreach ($premisses as $keyPremisse => $premisse) {
                    if (isset($facts[$indexFacts])) {
                        if ($keyPremisse === $facts[$indexFacts]->getName()) {
                            if ($premisse === $facts[$indexFacts]->getValue()) {
                                $verifiedPremisses++;
                                array_push($checkPremisses, $keyPremisse);
                                if ($verifiedPremisses === sizeof($premisses)) {
                                    $this->factsBase->setFacts($checkFacts);
                                    $conclusion = $rules[$indexRules]->getConclusion();
                                    $this->factsBase->addFact($conclusion, true);
                                    $this->checkBase->removeFactWithPremisses($checkPremisses);
                                    $this->checkBase->addFact($conclusion, true);
                                }
                            }
                        }
                    }
                }
                $indexFacts++;
            }
            $indexRules++;
        }

        return $conclusion;
    }
}
