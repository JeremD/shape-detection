<?php
/**
 * User: jerem
 * Date: 14/03/2018
 */

include_once 'JSONParser.php';

#TODO
// populate FactsBase & Base
// compare RulesBase & FactsBase
// output result (pop-in)

class Detection {
    private $rightAnglesNb;
    private $parallelSidesNb;
    private $sidesNb;
    private $identicalSidesNb;
    private static $SHAPES = [
        "trq"   => "This is just a triangle",
        "trr"   => "This is a right-angle triangle",
        "tri"   => "This is a isosceles triangle",
        "trri"  => "This is right-angled isosceles triangle",
        "tre"   => "This is an equilatéral rectangle",
        "quq"   => "This is just a quadrilateral",
        "tra"   => "This is a trapezium",
        "par"   => "This is a parallelogram",
        "los"   => "This is a diamond",
        "rec"   => "This is a rectangle",
        "car"   => "This is a squarecarré",
        "peq"   => "This is just a pentagone",
        "per"   => "This is an equilateral pentagone",
        "err"   => "This is non-sens...!"
    ];

    /**
     * Detection constructor.
     */
    public function __construct($inputs, $url) {
        $ruleBase = new RulesBase();
        $json = file_get_contents($url);
        $jsonParser = new JSONParser($json, $ruleBase);

        echo '<pre>';
        var_dump($ruleBase);
        echo '</pre>';
        die;
    }
}
