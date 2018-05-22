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

new Detection(null, 'data/rules.json');
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="img/favicon.png" type="image/png">
    <link rel="stylesheet" type="text/css" href="style/expert_style.css">
    <script type='text/javascript' src='https://code.jquery.com/jquery-latest.min.js'></script>
    <script>
        $(document).ready(function() {
            $('input[name=input]').change(function(){
                $('form[name=input_form]').submit();
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
            <form action="." method="post" name="input_form">
                Make a wish:
                <p>
                <div class="cc-selector">
                    <input id="three" type="radio" name="input" value="3" />
                    <label class="drinkcard-cc three" for="three"></label>
                    <input id="four" type="radio" name="input" value="4" />
                    <label class="drinkcard-cc four" for="four"></label>
                    <input id="five" type="radio" name="input" value="5" />
                    <label class="drinkcard-cc five" for="five"></label>
                </div>
                </p>
            </form>
        </div>
        <hr/>
        <div>
            <h2>Number of parralel sides</h2>
            <hr/>
            <form action="." method="post" name="input_form">
                Make a wish:
                <p>
                <div class="cc-selector">
                    <input id="two" type="radio" name="input" value="2" />
                    <label class="drinkcard-cc two" for="two"></label>
                    <input id="four" type="radio" name="input" value="4" />
                    <label class="drinkcard-cc four" for="four"></label>
                </div>
                </p>
            </form>
        </div>
        <hr/>
        <div>
            <h2>Number of right angles</h2>
            <hr/>
            <form action="." method="post" name="input_form">
                Make a wish:
                <p>
                <div class="cc-selector">
                    <input id="one" type="radio" name="input" value="1" />
                    <label class="drinkcard-cc one" for="one"></label>
                    <input id="two" type="radio" name="input" value="2" />
                    <label class="drinkcard-cc two" for="two"></label>
                    <input id="three" type="radio" name="input" value="3" />
                    <label class="drinkcard-cc three" for="three"></label>
                    <input id="four" type="radio" name="input" value="4" />
                    <label class="drinkcard-cc four" for="four"></label>
                </div>
                </p>
            </form>
        </div>
        <hr/>
        <div>
            <h2>Number of identical sides</h2>
            <hr/>
            <form action="." method="post" name="input_form">
                Make a wish:
                <p>
                <div class="cc-selector">
                    <input id="three" type="radio" name="input" value="3" />
                    <label class="drinkcard-cc three" for="three"></label>
                    <input id="four" type="radio" name="input" value="4" />
                    <label class="drinkcard-cc four" for="four"></label>
                    <input id="five" type="radio" name="input" value="5" />
                    <label class="drinkcard-cc five" for="five"></label>
                </div>
                </p>
            </form>
        </div>
        <hr/>
        <div>
            <h2>Reset section</h2>
            <hr/>
            <form action="." method="post">
                Reset the whole system expert application:
                <p>
                    <input type="reset" value="Reset">
                    <input type="submit" value="Detect!">
                </p>
            </form>
        </div>
    </div>
</body>
</html>
