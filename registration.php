<!doctype html>
<html lang="en">
  <head>    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> 
  </head>
<body>
<?php 
      session_start();
      include 'popos.php';
      include 'dataHandlerMethods.php';
      //require 'rb-mysql.php';    
      
      $nev = new User();
      $nev->setName($_POST['user']);
      $nev->setPass($_POST['password']);
      $nev->setFullname($_POST['fullName']);
      $validate=true;
      if (($_POST['user']!='') and ($_POST['password']!='') and ($_POST['fullName']!='') ){
           $dataHandlerMethods = new dataHandlerMethods();
           $dataHandlerMethods->addUser($nev);                  
          }     
      ?>
    <h1></h1>    
    <form role="form" method="post" action="">
        <div type="container"> 
             <div class="form-group">
                <label>Név</label>
                <input type="text" name="fullName" class="form-control" id="fullName" aria-describedby="emailHelp" placeholder="">    
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="text" name="user" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">    
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Jelszó</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="">
            </div>             
       <button type="submit" class="btn btn-primary">Felvisz</button>
       <a href="index.php">visszalépés a főoldalra</a>
       </div>
        <h1></h1>
        
    <!--    <div class="container">
  <div class="row">
    <div class="col-m">
      One of three columns
    </div>
    <div class="col-6">
      One of three columns
    </div>
    <div class="col-m">
      One of three columns
    </div>
  </div>
</div>
        -->
</form>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>

