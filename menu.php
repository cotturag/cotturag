<?php
    session_start();    
    if ($_SESSION['pageName']=='moneyStatus') { 
        $moneyStatusPageActive='active';            
    }        
    if ($_SESSION['pageName']=='inputData') {
        $inputDataPageActive='active';     
    }   
?>
<form method="post">      
<!--    <input type="text" name="logout" value="logout">    -->
        <div class="row">
            <div class="container-fluid">
            <div class="col-sm-auto">
                <nav class="navbar navbar-expand-lg navbar-light bg-info">
                 <ul class="navbar-nav">                 
                     <li class="nav-item <?php echo $moneyStatusPageActive?>"><a class="nav-link" href="moneyStatus.php">Számlák állása</a></li>
                     <li class="nav-item <?php echo $inputDataPageActive?>"><a class="nav-link" href="inputData.php">Kiadás</a></li>
                     <li class="nav-item"><button class="btn" type="submit" name='logoutBtn' class="btn btn-secondary">kilépés</button></li>
                     <li class="nav-item"><?php echo 'Felhasználó: '.$_SESSION['user'];?></li>
                 </ul>         
                </nav>                
            </div>
            </div>        
        </div>   
</form>
