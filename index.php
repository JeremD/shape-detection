<?php
/**
 * User: jerem & momomo
 * Date: 14/03/2018
 */

session_start();

?>

<!DOCTYPE html>
<html>
<head>
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="img/favicon.png" type="image/png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
          integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style/expert_style.css">
    <script type='text/javascript' src='https://code.jquery.com/jquery-latest.min.js'></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"
            integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    <script type='text/javascript' src='js/expert_script.js'></script>
    <title>Artificial Intelligence project: Shape Detection (by Jerem & momomo)</title>
</head>
<body>
<?php
    if(!empty($e)) {
        echo $e->getMessage();
    }
?>
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
                    <input id="two" type="radio" name="input" value="2"/>
                    <label class="drinkcard-cc two" for="two"></label>
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

            <input type="hidden" id="sides-number" name="sides-number" value="3">
            <input type="hidden" id="parallel-sides-number" name="parallel-sides-number" value="0">
            <input type="hidden" id="right-angles-number" name="right-angles-number" value="0">
            <input type="hidden" id="identical-sides-number" name="identical-sides-number" value="0">

            <a id="detect" data-toggle="modal" href="#result" class="btn btn-secondary btn-lg">Detect!</a>
            <div class="modal fade" id="result" role="dialog" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <p id="text-result"></p>
                            <button type="button" class="close" data-dismiss="modal">×</button>
                        </div>
                        <div class="modal-body">
                            <img id="img-result">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
