<?php
include_once("global_var.php");
include_once("questionaire.php");

$_error='';
$_message= '';
$_rtn=false;
//error_reporting(E_ALL);
//ini_set('display_errors', '1');

if($_SERVER["REQUEST_METHOD"] == "GET")
 { 
    

    $question = new questionaire();

    $question->q1 = $_REQUEST["q1"];
    $question->q2 = $_REQUEST["q2"];
    $question->q3 = $_REQUEST["q3"];
    $question->q4 = $_REQUEST["q4"];
    $question->rstring = $_REQUEST["rstring"];
    $_rtn=($question->updateQuestionaire());

    if($_rtn) {
        $_message = 'Thank You for your response. We will get back to you shortly';
    } else {
        $_message = 'Oooops';
    }
 }

  ?>
<!DOCTYPE html>
<html>

<head>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css" media="screen,projection" />
    <!--<link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
    Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <style type="text/css">
        #id_row_form {
            opacity: 1;
            transition: all .5s ease-out;
        }
    </style>
</head>

<body class="grey lighten-3">
    <!--Import jQuery before materialize.js-->
    <div class="container">
        
        <div class="row" id="id_row_form">
            <div class="col s12" >
                <div class="card">
                    <div class="card-content">
                        <span class="card-title black-text"><?php echo $_message; ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
</body>

</html>
