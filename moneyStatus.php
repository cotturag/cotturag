<!doctype html>
<html>
  <head>    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">   
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="../design/designForAll.css"> 
    <script src="../tools/jquery-3.3.1.js"></script>   
    <script src="../bootstrap/js/bootstrap.bundle.js"></script>    
  </head>
  <body>
  
<?php
session_start();
include 'accounts.php';
include 'viewCreaterMethodsClass.php';
$_SESSION['pageName']='moneyStatus';
include 'logout.php';
include 'menu.php';

if (isset($_POST['logoutBtn'])){
    logoutClass::logout();
    header("Location: index.php");   
}


$resu= accounts::getMoneyStatusFromDb();
//$resuExt= dataHandlerMethods::getMeta();
//viewCreaterMethods::tableWriter($resu);
//viewCreaterMethods::tableWriter($resu);
viewCreaterMethods::specialEditableTableWriter($resu);
if (isset($_POST["updateAccounts"])) {
//    $sql='';
//    R::exec($sql);    
}


?>      


<form action="moneyStatus.php" method="post">
<input type="submit" name="updateAccounts" value="Változások mentése">
<a href="createAccount.php"> Számlák hozzáadása     </a>

</form>

</body>
</html>

