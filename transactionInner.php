<!doctype html>
<?php
session_start();
include 'accounts.php';
include 'viewCreaterMethodsClass.php';
function transBlank(){
    echo '<div class="col-4" id="uresSzamlaAblak" style="text-align:center;"></div>';
}
function transMiddle(){
    echo '<div class="col-4" style="height:150px;text-align:center;">
        ---------->
         
    </div>';
}
function transAccounts($posAccounts){
    switch ($posAccounts){
        case 1:{
            include 'transactionInnerAccounts.php';                    
            break;
        }
        case 3:{            
            include 'transactionInnerAccounts.php';                    
            break;
        }
    }
    $posAccounts=0;
}
function transPaymentCategories(){
    include 'transactionInnerPaymentCategories.php';
}
switch ($_SESSION["transactionType"]){
    case "in":{
            transBlank();
            transMiddle();
            transAccounts(3);            
        break;
    }
    case "trans":{
            transAccounts(1);
            transMiddle();
            transAccounts(3);
        break;
    }
    case "out":{
            transAccounts(1);
            transMiddle();
            transPaymentCategories();
        break;
    }
}

?>             


    

