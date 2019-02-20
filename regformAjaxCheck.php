<?php

include 'popos.php';
require 'rb-mysql.php';
        R::setup('mysql:host=localhost;dbname=cotturag_cotturag',
        'cotturag_cotturag', 'Kiafasztudja1' );

$username=$_GET["p"];

$sql='SELECT * FROM emberek WHERE db_username="'.$username.'"';
$rs=R::getAll($sql);

if ($username !=""){
    if ($rs[0]["db_username"]!=""){
        echo '<span id="feedbackSpan" style="color:red">Ez a felhasználónév már foglalt</span>';
       // $_SESSION["regInputFeedback"];
    }
    else { 
        echo '<span id="feedbackSpan" style="color:green">Rendben</span>';
        // $_SESSION["regInputFeedback"];   
    }
}




