<?php
/**
 * Created by PhpStorm.
 * User: momomo
 * Date: 21/05/2018
 * Time: 19:37
*/

include_once 'RulesBase.php';
include_once 'Rule.php';

class JSONParser
{
    public function __construct($json)
    {
        $rules = array();
        $jsonRules = new RulesBase($json);
        $files = new RecursiveIteratorIterator($jsonRules);
        while ($files->valid()) {
            $file = $files->current();
            $filename = $file->getFilename();
            $deepness = $files->getDepth();
            $files->next();
            $valid = $files->valid();
            if ($valid and ($files->getDepth() - 1 == $deepness or $files->getDepth() == $deepness)) {
                var_dump($file);
                die;
                // array_push($rules, new Rule());
            } else {
            }
        }
    }
}