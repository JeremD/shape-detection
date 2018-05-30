<?php
/**
 * User: jerem & momomo
 * Date: 14/03/2018
 */

include_once 'Detection.php';

if(!empty($_POST)) {
    $inputs = $_POST;

    try {
        $detection = new Detection(array(
            $inputs['sides-number'],
            $inputs['parallel-sides-number'],
            $inputs['right-angles-number'],
            $inputs['identical-sides-number']),
            'data/rules.json');
    } catch (Exception $e) {
    }

    $conclusionCode = $detection->detect();

    echo json_encode($detection->getMessageDetection($conclusionCode));
}

?>