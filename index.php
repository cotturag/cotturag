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
  <body class="container-fluid">
      <form action="index.php" method="post">       
      <?php
      session_start();
      include 'popos.php';
      require 'rb-mysql.php';
        R::setup('mysql:host=localhost;dbname=cotturag_cotturag',
        'cotturag_cotturag', 'Kiafasztudja1' );    
      
      if ($_SESSION['user']!='') header("Location: moneyStatus.php");      
   

      $tartalom=R::findOne('emberek','db_username = ?',[$_POST['username']]);


      if (($tartalom['db_password']==$_POST['password'])and $tartalom!=''){          
          $_SESSION['user']=$tartalom['db_username'];          
           header("Location: moneyStatus.php"); 
      }
      ?>        
        <div class="row">          
            <div class="col-sm-4"></div>
            <div class="col-sm-4" class="inputwindow">            
                <div class="form-group">
                    <label for="username">Email</label>
                    <input type="email" name="username" value="" class="form-control" placeholder="pelda@pelda.pld">                          
                </div>
                <div class="form-group">                   
                    <label for="password">Jelszó:</label>
                    <input type="password" name="password" value="" class="form-control">
                </div>
                <div class="form-group">
                    <input type="submit" value="Belépés" class="btn btn-primary form-control"> 
                </div>               
            
            <a href="registration.php">Regisztráció</a>        
            </div>
          </div>
          <div class="col-sm-4"></div>
        </div>
    </form>
  </body>
</html>
