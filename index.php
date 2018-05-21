<?php
/**
 * User: jerem & momomo
 * Date: 14/03/2018
 */

require_once('Detection.php');

session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="img/favicon.png" type="image/png">
    <link rel="stylesheet" type="text/css" href="style/perceptron_style.css">
    <script type='text/javascript' src='https://code.jquery.com/jquery-latest.min.js'></script>
    <script>
        $(document).ready(function() {
            $('input[name=input]').change(function(){
                $('form[name=input_form]').submit();
            });
        });
    </script>
    <title>Neural network project: a perceptron detecting some digits</title>
</head>
<body>
    <div>
        <h1>Neural network project<span class="smaller"> a perceptron detecting some digits</span></h1>
        <hr/>
        <hr/>
        <div>
            <h2>Training section</h2>
            <hr/>
            <form action="." method="post">
                Set the number of shape:
                <p>
                    <input type="number" name="iteration_nb" value="1000">
                </p>
                Wanna try an automatic training?
                <p>
                    <input type="checkbox" name="automatic_training" value="1">
                </p>
                <input type="submit" name="training" value="Train & learn">
            </form>
        </div>
        <hr/>
        <div>
            <h2>Guessing section</h2>
            <hr/>
            <form action="." method="post" name="input_form">
                Make a wish:
                <p>
                    <div class="cc-selector">
                        <input id="zero" type="radio" name="input" value="zero" />
                        <label class="drinkcard-cc zero" for="zero"></label>
                        <input id="one" type="radio" name="input" value="1" />
                        <label class="drinkcard-cc one" for="one"></label>
                        <input id="two" type="radio" name="input" value="2" />
                        <label class="drinkcard-cc two" for="two"></label>
                        <input id="three" type="radio" name="input" value="3" />
                        <label class="drinkcard-cc three" for="three"></label>
                        <input id="four" type="radio" name="input" value="4" />
                        <label class="drinkcard-cc four" for="four"></label>
                        <input id="five" type="radio" name="input" value="5" />
                        <label class="drinkcard-cc five" for="five"></label>
                        <input id="six" type="radio" name="input" value="6" />
                        <label class="drinkcard-cc six" for="six"></label>
                        <input id="seven" type="radio" name="input" value="7" />
                        <label class="drinkcard-cc seven" for="seven"></label>
                    </div>
                </p>
            </form>
        </div>
        <hr/>
        <div>
            <h2>Reset section</h2>
            <hr/>
            <form action="." method="post">
                Reset the whole perceptron:
                <p>
                    <input type="reset" value="Reset">
                    <input type="submit" value="Detect!">
                </p>
            </form>
        </div>
    </div>
</body>
</html>
