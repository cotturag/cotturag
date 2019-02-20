<!doctype html>
<?php
session_start();    
//    if ($_SESSION['pageName']=='moneyStatus') { 
//        $moneyStatusPageActive='active';            
//    }        
//    if ($_SESSION['pageName']=='inputData') {
//        $inputDataPageActive='active';     
//    }   
?>
<html>
<body class="container-fluid">
<form method="post">    
        <div class="row" style="background-color: greenyellow; text-align: center;" >
            <div class="col-4">
                <span><a href="moneyStatus.php">Számlák állása</a></span>
            </div>
            <div class="col-4">                 
<!--                 <span><a href="inputData.php">Kiadás</a></span>-->
                 <a href="transactions.php">Tranzakciók</a>                                  
            </div>
            <div class="col-4">
                <button type="submit" name='logoutBtn' class="btn btn-secondary">kilépés</button>
                <span><?php echo 'Felhasználó: '.$_SESSION['user'];?></span>     
            </div>
            
            
            
        </div>    
</form>
</body>
</html>