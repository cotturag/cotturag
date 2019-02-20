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
      <form action="createAccount.php" method="post">
          <div class="row">
              <div class="col-sm-4">
              </div>
              <div class="col-sm-4">                
                  <div class="form-group">
                      <label class="form-control-label">Számla neve:</label>                      
                      <input type="text" name="accountName" class="form-control">              
                  </div>
                  <div class="form-group">
                      <label class="form-control-label">Számla értéke:</label>
                      <input type="text" name="accountValue" class="form-control">
                  </div>
                  <div class="form-group">
                      <input type="submit" name="ok" class="btn btn-primary form-control">
                  </div>
                  <a href="index.php">vissza a főoldalra</a>
              </div>
              <div class="col-sm-4">
              </div>    
          </div>          
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
  </body>
</html>

