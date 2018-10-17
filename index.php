<!doctype html>
<html lang="en">
  <head>    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">   
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">-->  
    <link rel="stylesheet" href="design.css" type="text/css">
  </head>
  <body>
      <form action="index.php" method="post">       
      <?php
      session_start();
      include 'popos.php';
      include 'dataHandlerMethods.php';      
      
      if ($_SESSION['user']!='') header("Location: moneyStatus.php");      
   

      $tartalom=R::findOne('emberek','db_username = ?',[$_POST['username']]);


      if (($tartalom['db_password']==$_POST['password'])and $tartalom!=''){          
          $_SESSION['user']=$tartalom['db_username'];          
           header("Location: moneyStatus.php"); 
      }
      ?> 

          <div class="container-fluid">
            <div class="row">
                <div class="row no-gutters">
                    <div class="col-sm-1">                        
                    </div>
                    <div class="col-sm-1">
                        Felhasználónév:<br /> 
                        <input type="text" name="username" value="" /> 
                        <br /><br /> 
                        Jelszó:<br /> 
                        <input type="password" name="password" value="" /> 
                        <br /><br /> 
                        <input type="submit" class="btn btn-info" value="Login" /> 
                        <a href="registration.php">Regisztráció</a>                   
                    </div>
                    <div class="col-sm-1">                        
                    </div>           
                </div>               
            </div>
        </div>   
    </form>
<!--    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>  -->
  </body>
</html>
