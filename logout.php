<?php
session_start();
 class logoutClass{
    public static function logout(){
            $_SESSION['user']='';
    }
}
?>

