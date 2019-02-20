<?php
session_start();
if (isset($_GET["transType"])){
    $_SESSION["transactionType"]=$_GET["transType"];
}

if (isset($_GET["accountItem1"])){
    $_SESSION["accountItem1"]=$_GET["accountItem1"];
}

if (isset($_GET["accountItem3"])){
    $_SESSION["accountItem3"]=$_GET["accountItem3"];
}

if (isset($_GET["accountValue1"])){
    $_SESSION["accountValue1"]=$_GET["accountValue1"];
}
   
if (isset($_GET["accountValue3"])){
    $_SESSION["accountValue3"]=$_GET["accountValue3"];
}
if (isset($_GET["paymentItem"])){
    $_SESSION["paymentItem"]=$_GET["paymentItem"];
}
