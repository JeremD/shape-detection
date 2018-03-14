<?php
/**
 * User: momomo
 * Date: 17/01/2018
 */

require_once('Perceptron.php');
require_once('Training.php');
require_once('Neuron.php');
require_once('Digit.php');

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
            <?php
//            $iteration_nb = 10000;
//            $perceptron = new Perceptron(3, $iteration_nb, 'neural_network_inputs.json');
//            $result = $perceptron->run(5);
//            var_dump($result);

                if(!empty($_POST["reset"])) {
                    unset($_SESSION["perceptron"]);
                }

                if(empty($_POST["training"]) && empty($_SESSION["perceptron"])) {
            ?>
            <form action="." method="post">
                Set the number of learnin' iterations:
                <p>
                    <input type="number" name="iteration_nb" value="1000">
                </p>
                Wanna try an automatic training?
                <p>
                    <input type="checkbox" name="automatic_training" value="1">
                </p>
                <input type="submit" name="training" value="Train & learn">
            </form>
            <?php
            } else {
                    ?>
                    <div>
                        <h3><small>Lesson learned...!</small></h3>
                    </div>
                    <?php
                    if(empty($_SESSION["perceptron"])) {
                        $iteration_nb = (int) $_POST["iteration_nb"];
                        if($_POST["training"] === 1 || $iteration_nb <= 0) {
                            $iteration_nb = 0;
                        }
                        $perceptron = new Perceptron(3, $iteration_nb, 'neural_network_inputs.json');
                        $_SESSION["perceptron"] = serialize($perceptron);
                    }
                }
            ?>
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
            <?php
            if(!empty($_POST["input"]) && !empty($_SESSION["perceptron"])) {
                if($_POST["input"] === "zero") {
                    $_POST["input"] = "0";
                }
                $perceptron = unserialize($_SESSION["perceptron"]);
                $result = $perceptron->run((int) $_POST["input"]);
                ?>
                <h3><small>You asked for the <span class="asked"><?php echo $_POST["input"] ?></span> number... and the answer is &rarr; <span class="answer"><?php echo $result ?></span>!</small></h3>
                <?php
            }
            ?>
        </div>
        <hr/>
        <div>
            <h2>Reset section</h2>
            <hr/>
            <form action="." method="post">
                Reset the whole perceptron:
                <p>
                    <input type="submit" name="reset" value="Reset">
                </p>
            </form>
        </div>
    </div>
</body>
</html>