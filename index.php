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

if (!empty($_POST)) {
    new Detection(
        array(
            $_POST['sides-number'],
            $_POST['parallel-sides-number'],
            $_POST['right-angles-number'],
            $_POST['identical-sides-number']),
        'data/rules.json'
    );
}

?>

<!DOCTYPE html>
<html>
<head>
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="img/favicon.png" type="image/png">
    <link rel="stylesheet" type="text/css" href="style/expert_style.css">
    <script type='text/javascript' src='https://code.jquery.com/jquery-latest.min.js'></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
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
                    <input type="submit" class="btn btn-primary btn-lg" value="Detect!">
                </p>
            </form>

              <!-- Modif -->
              <!-- Button trigger modal -->
              <a data-toggle="modal" href="#result" class="btn btn-primary btn-lg">Detect!</a>

              <!-- Modal -->
              <div class="modal fade" id="result" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
              <div class="modal-content">
              <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title">Result of shape detection </h4>
              </div>
              <div class="modal-body">
              <img class="img-responsive" src="img/shapes/tre.png" alt="image" />
              This is just a triangle
              </div>
              <!-- <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
              </div> -->
              </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
              </div><!-- /.modal -->
        </div>
    </div>
</body>
</html>
