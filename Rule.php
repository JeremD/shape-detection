<?php
/**
 * Created by PhpStorm.
 * User: momomo
 * Date: 21/05/2018
 * Time: 19:37
 */

class Rule
{
    private $premisses = array();
    private $conclusion = '';

    public function __construct($jsonRule)
    {
        #TODO traiter la JSON Rule pour les décomposer en prémisses + conclusion
//        foreach($premisses as $premisse) {
//            array_push($this->premisses,$premisse);
//        }
//        $this->conclusion = $conclusion;
    }
}