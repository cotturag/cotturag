<!doctype html>
<html lang="en">
  <head>    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">   
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">  
  </head>
  <body>
      <form action="createAccount.php" method="post">
          <div class="input-group">
              <div class="input-goup-prepend">
                  <span class="input-group-text">Számla neve:</span>
              </div>
              <input type="text" name="accountName">              
              <div class="input-goup-prepend">
                  <span class="input-group-text">Számla értéke:</span>
              </div>
              <input type="text" name="accountValue">
          </div>
          <input type="submit" name="ok">
      </form>
      
      
      <?php 
      session_start();
      require 'rb-mysql.php';
      R::setup('mysql:host=localhost;dbname=cotturag_cotturag',
        'cotturag_cotturag', 'Kiafasztudja1' );      
      
      //lekérdezi a felhasználó azonosítóját a session-ben lévő neve alapján  
      $sql='SELECT ember FROM emberek WHERE db_username="'.$_SESSION["user"].'";';      
      $rs=R::getAll($sql);
      $ember=$rs[0]['ember'];
      
      if (isset($_POST["ok"]) and ($_POST['accountName']!='') and ($_POST['accountValue']!='')){                                     
          $sql='SELECT ember FROM accounts WHERE ember="'.$ember.'"  AND account="'.$_POST['accountName'].'"';
          $rs=R::getAll($sql);              
          if ($rs[0]['ember']==""){           
              $sql='INSERT INTO accounts (ember,account,money) VALUES ("'.$ember.'","'.$_POST['accountName'].'","'.$_POST["accountValue"].'")';
              R::exec($sql);
          }         
      }
      
      ?>
    
    
      <a href="index.php">vissza a főoldalra</a>  
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>  
  </body>
</html>

