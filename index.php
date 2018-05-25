<?php
/**
 * User: jerem & momomo
 * Date: 14/03/2018
 */

include_once 'Detection.php';
include_once 'RulesBase.php';
include_once 'Rule.php';
include_once 'FactsBase.php';
include_once 'Fact.php';

session_start();

if(!empty($_POST)) {
    new Detection(array(
            $_POST['sides-number'],
            $_POST['parallel-sides-number'],
            $_POST['right-angles-number'],
            $_POST['identical-sides-number']),
        'data/rules.json');
}

?>

<!DOCTYPE html>
<html>
<head>
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="img/favicon.png" type="image/png">
    <link rel="stylesheet" type="text/css" href="style/expert_style.css">
    <script type='text/javascript' src='https://code.jquery.com/jquery-latest.min.js'></script>
    <script>
        $(function() {
            $('.init-value').addClass('selected');
            $('#sides-number-form').click(function(event){
                if((event.target.className).indexOf('drinkcard-cc') >= 0) {
                    value = event.target.previousElementSibling.value;
                    $(this).children().removeClass('selected');
                    event.target.classList.add('selected');
                    $('#sides-number').val(value);
                }
            });
            $('#parallel-sides-number-form').click(function(event){
                if((event.target.className).indexOf('drinkcard-cc') >= 0) {
                    value = event.target.previousElementSibling.value;
                    $(this).children().removeClass('selected');
                    event.target.classList.add('selected');
                    $('#parallel-sides-number').val(value);
                }
            });
            $('#right-angles-number-form').click(function(event){
                if((event.target.className).indexOf('drinkcard-cc') >= 0) {
                    value = event.target.previousElementSibling.value;
                    $(this).children().removeClass('selected');
                    event.target.classList.add('selected');
                    $('#right-angles-number').val(value);
                }
            });
            $('#identical-sides-number-form').click(function(event){
                if((event.target.className).indexOf('drinkcard-cc') >= 0) {
                    value = event.target.previousElementSibling.value;
                    $(this).children().removeClass('selected');
                    event.target.classList.add('selected');
                    $('#identical-sides-number').val(value);
                }
            });
        });
    </script>
    <title>Artificial Intelligence project: Shape Detection (by Jerem & momomo)</title>
</head>
<body>
    <div>
        <h1>Artificial Intelligence project<span class="smaller"> a system expert application</span></h1>
        <hr/>
        <hr/>
        <div>
            <h2>Number of sides</h2>
            <hr/>
            <div class="cc-selector sides-number-form" id="sides-number-form">
                <input id="three" type="radio" name="input" value="3"/>
                <label class="drinkcard-cc three selected" for="three"></label>
                <input id="four" type="radio" name="input" value="4"/>
                <label class="drinkcard-cc four" for="four"></label>
                <input id="five" type="radio" name="input" value="5"/>
                <label class="drinkcard-cc five" for="five"></label>
            </div>
        </div>
        <hr/>
        <div>
            <h2>Number of parralel sides</h2>
            <hr/>
            <div class="cc-selector parallel-sides-number-form" id="parallel-sides-number-form">
                <input id="zero" type="radio" name="input" value="0"/>
                <label class="drinkcard-cc zero selected" for="zero"></label>
                <input id="two" type="radio" name="input" value="2"/>
                <label class="drinkcard-cc two" for="two"></label>
                <input id="four" type="radio" name="input" value="4"/>
                <label class="drinkcard-cc four" for="four"></label>
            </div>
        </div>
        <hr/>
        <div>
            <h2>Number of right angles</h2>
            <hr/>
            <p>
                <div class="cc-selector right-angles-number-form" id="right-angles-number-form">
                    <input id="zero" type="radio" name="input" value="0"/>
                    <label class="drinkcard-cc zero selected" for="zero"></label>
                    <input id="one" type="radio" name="input" value="1"/>
                    <label class="drinkcard-cc one" for="one"></label>
                    <input id="two" type="radio" name="input" value="2"/>
                    <label class="drinkcard-cc two" for="two"></label>
                    <input id="three" type="radio" name="input" value="3"/>
                    <label class="drinkcard-cc three" for="three"></label>
                    <input id="four" type="radio" name="input" value="4"/>
                    <label class="drinkcard-cc four" for="four"></label>
                </div>
            </p>
        </div>
        <hr/>
        <div>
            <h2>Number of identical sides</h2>
            <hr/>
            <p>
                <div class="cc-selector identical-sides-number-form" id="identical-sides-number-form">
                    <input id="zero" type="radio" name="input" value="0"/>
                    <label class="drinkcard-cc zero selected" for="zero"></label>
                    <input id="three" type="radio" name="input" value="3"/>
                    <label class="drinkcard-cc three" for="three"></label>
                    <input id="four" type="radio" name="input" value="4"/>
                    <label class="drinkcard-cc four" for="four"></label>
                    <input id="five" type="radio" name="input" value="5"/>
                    <label class="drinkcard-cc five" for="five"></label>
                </div>
            </p>
        </div>
        <hr/>
        <div>
            <h2>Guessin' section</h2>
            <hr/>
            <form action="." method="post">
                <input type="hidden" id="sides-number" name="sides-number" value="3">
                <input type="hidden" id="parallel-sides-number" name="parallel-sides-number" value="0">
                <input type="hidden" id="right-angles-number" name="right-angles-number" value="0">
                <input type="hidden" id="identical-sides-number" name="identical-sides-number" value="0">
                <p>
                    <input type="reset" value="Reset">
                    <input type="submit" value="Detect!">
                </p>
            </form>
        </div>
    </div>
</body>
</html>
