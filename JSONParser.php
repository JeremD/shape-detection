<?php
/**
 * Created by PhpStorm.
 * User: momomo
 * Date: 21/05/2018
 * Time: 19:37
*/

include_once 'RulesBase.php';
include_once 'Rule.php';

class JSONParser {
    private $jsonRul = array();
    private static $RULE_NAMES = [
        "sides",
        "parallelSides",
        "rightsAngles",
        "identicalSides"
    ];

    public function __construct($json, $ruleBase) {
        $json = json_decode($json, true);

        foreach($json['rules'] as $ruleName => $ruleContent) {
            $ruleBase->makeRule($ruleName, $ruleContent['premisses'], key($ruleContent['conclusion']));
            foreach($ruleContent['conclusion'][key($ruleContent['conclusion'])] as $subRuleName => $subRuleContent) {
                $ruleBase->makeRule($subRuleName, $subRuleContent['premisses'], key($subRuleContent['conclusion']));
            }
        }
    }
}