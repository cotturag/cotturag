<!doctype html>
<html>
  <head>    
   <meta charset="utf-8">   
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">   
   <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css"> 
   <link rel="stylesheet" href="../design/designForAll.css"> 
   <script src="../tools/jquery-3.3.1.js"></script>   
   <script src="../bootstrap/js/bootstrap.bundle.js"></script>
   <script type="text/javascript">      
        function feedback(){                      
        document.getElementById("inputEmail").classList.remove("is-valid");    
            document.getElementById("inputEmail").classList.remove("is-invalid");   
            switch (document.getElementById("feedbackSpan").style.color){
                case "green":
                    document.getElementById("inputEmail").classList.remove("is-invalid");    
                    document.getElementById("inputEmail").classList.add("is-valid");
                    break;
                case "red":
                    document.getElementById("inputEmail").classList.remove("is-valid");       
                    document.getElementById("inputEmail").classList.add("is-invalid");
                    break;              
            }
        }
        function megnez(mit){                       
            if (window.XMLHttpRequest){
                http = new XMLHttpRequest();
            }
            else {
                http = new ActiveXObject("Microsoft.XMLHTTP");
            }
            http.abort();
            http.onreadystatechange = function(){
                if (http.readyState == 4){                    
                    document.getElementById("felhasznaloInput").innerHTML = http.responseText;
                    feedback();
                    
                }
            }            
            http.open("GET","regformAjaxCheck.php?p="+mit,true);
            http.send(null);            
        }        
    </script>
  </head>
<body>
<?php 
      session_start();
      include 'popos.php';      
      include 'emberek.php';        
      
      $nev = new User();
      $nev->setName($_POST['user']);
      $nev->setPass($_POST['password']);
      $nev->setFullname($_POST['fullName']);
      $validate=true;
      if (($_POST['user']!='') and ($_POST['password']!='') and ($_POST['fullName']!='') ){
           $emberek = new emberek();
           $emberek->addUser($nev);
          }     
?>              
<body class="container-fluid">
    <form role="form" method="post" action=""> 
        <div class="row">
            <div class="col-sm-4">
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label class="form-control-label" for="fullName">Név</label>
                    <input type="text" name="fullName" id="fullName" class="form-control">
                </div>
                <div class="form-group">
                    <label class="form-control-label" for="inputEmail">Email</label>
                    <input onkeyup="javascript:megnez(user.value)" type="email" name="user" id="inputEmail" placeholder="pelda@pelda.pld" class="form-control"><span id="felhasznaloInput"></span>
                </div>
                <div class="form-group">
                    <label class="form-control-label" for="inputPassword">Jelszó</label>
                    <input type="password" name="password" id="inputPassword" placeholder="" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary form-control">Felvisz</button>
                </div>
                <a href="index.php">visszalépés a főoldalra</a>         
            </div>
            <div class="col-sm-4">
            </div>
        </div>
    </form>   
</body>
</html>

