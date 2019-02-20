<?php
session_start(); 
require 'rb-mysql.php';
R::setup('mysql:host=localhost;dbname=cotturag_cotturag',
    'cotturag_cotturag', 'Kiafasztudja1' );
class emberek {
        public function addUser(User $user_obj){
              $sql='INSERT INTO emberek (ember,db_username,db_password,fullname) VALUES ("","'.$user_obj->getName().'","'.$user_obj->getPass().'","'.$user_obj->getFullname().'")';
              R::exec($sql);
          }
}
?>