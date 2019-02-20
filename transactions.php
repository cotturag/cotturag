<!doctype html>
<html>
<?php
session_start();
include 'logout.php';
if (isset($_POST['logoutBtn'])){
    logoutClass::logout();
    header("Location: index.php");   
}
include 'menu.php';
?>
  <head>    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">   
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="../design/designForAll.css"> 
    <script src="../tools/jquery-3.3.1.js"></script>   
    <script src="../bootstrap/js/bootstrap.bundle.js"></script>
    <script type="text/javascript">           
    function transactionInnerAjaxPhp(transType){       
        if (window.XMLHttpRequest){
            http = new XMLHttpRequest();
        }
        else {
            http = new ActiveXObject("Microsoft.XMLHTTP");
        }
       // http.abort();
        http.onreadystatechange = function(){
            if (http.readyState == 4){                
              //  document.getElementById("transMenuIn").innerHTML=http.responseText;
            }      
        }            
        http.open("GET","valueSessionStarterAjax.php?transType="+transType,true);        
        http.send("");     
    }
    
    function menuInOn() {
        document.getElementById("transMenuOut").style.background="gray";
        document.getElementById("transMenuTrans").style.background="gray";
        document.getElementById("transMenuIn").style.background="initial";
        document.getElementById("transMenuIn").style.border="initial";
        document.getElementById("transMenuOut").style.border="1px white solid";    
        document.getElementById("transMenuTrans").style.border="1px white solid";
    }
    function menuOutOn() {
        document.getElementById("transMenuIn").style.background="gray";
        document.getElementById("transMenuTrans").style.background="gray";
        document.getElementById("transMenuOut").style.background="initial";
        document.getElementById("transMenuOut").style.border="initial";
         document.getElementById("transMenuIn").style.border="1px white solid";    
        document.getElementById("transMenuTrans").style.border="1px white solid"; 
    }
    function menuTransOn() {
        document.getElementById("transMenuOut").style.background="gray";
        document.getElementById("transMenuIn").style.background="gray";
        document.getElementById("transMenuTrans").style.background="initial";
        document.getElementById("transMenuTrans").style.border="initial";
         document.getElementById("transMenuIn").style.border="1px white solid";    
        document.getElementById("transMenuOut").style.border="1px white solid"; 
    }  
                 
    </script>
  </head>  
  <body class="container-fluid">
  <form id="transactionForm" action="transactions.php" method="GET">  
    <div class="row"  style="height:50px;">
        <div class="col-4 rounded" style="" onclick="transactionInnerAjaxPhp('in');document.getElementById('transactionForm').submit();" id="transMenuIn">
        bevétel        
        </div>
        <div class="col-4 rounded" style="" onclick="transactionInnerAjaxPhp('trans');document.getElementById('transactionForm').submit();" id="transMenuTrans">    
        pénzmozgás
        </div>
        <div class="col-4 rounded" style="" onclick="transactionInnerAjaxPhp('out');document.getElementById('transactionForm').submit();" id="transMenuOut">
        kiadás
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4" style="height:150px;">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
        </div>
        <div class="col-sm-6" style="height:150px;">
            <div class="row" id='transArea'>                
                <?php                
                    if (isset($_SESSION["transactionType"])){
                        echo '<script type="text/javascript"> transactionInnerAjaxPhp("'.$_SESSION["transactionType"].'"); </script>';        
                    }
                    else {
                        echo '<script type="text/javascript">transactionInnerAjaxPhp("out");document.getElementById("transactionForm").submit(); </script>';
                    }  
                    include 'transactionInner.php';
                ?>
            </div>
        </div>
        <div class="col-sm-3">        
        </div>
    </div>
      <div class="row">
          <div class="col-4">
          </div>
          <div class="col-4" style="text-align: center;">
              <input type='number' style="width:150px;"><br />
            <input type="submit" class="btn-primary" value="rögzít">        
          </div>
          <div class="col-4">
          </div>
      </div>
      
    
<?php  
        switch ($_SESSION["transactionType"]){
          case "trans":{
               echo '<script type="text/javascript">menuTransOn();</script>';
               break;
          }
          case "out":{
               echo '<script type="text/javascript">menuOutOn();</script>';               
               break;
          }
          case "in":{
               echo '<script type="text/javascript">menuInOn();</script>';                              
               break;   
          }
        } 

?>
  </form>
</body>
</html>

