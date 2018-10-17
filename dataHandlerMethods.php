<?php
session_start();
require 'rb-mysql.php';
R::setup('mysql:host=localhost;dbname=cotturag_cotturag',
        'cotturag_cotturag', 'Kiafasztudja1' );


    class dataHandlerMethods{                 
         //lemásolom az asszociációs tömböt egy sima két dimenziós tömbbe
         private static function assocArrayToSimpleArray($res){
              for ($i=0;$i<=count($res);$i++){
                  $j=0;
                  //if (key($res[$i])='autentid') 
                  foreach ($res[$i] as $resVal){
                      $j++;
                      $copiedRes[$i][$j]=$resVal;
                  }
              }
              return $copiedRes;
          }
          
          public function addUser(User $user_obj){
              $sql='INSERT INTO emberek (ember,db_username,db_password,fullname) VALUES ("","'.$user_obj->getName().'","'.$user_obj->getPass().'","'.$user_obj->getFullname().'")';
              R::exec($sql);
          }
          
          public static function getMoneyStatusFromDb(){              
              $user=$_SESSION['user'];             
              $res=R::findOne('emberek','db_username = ?',[$user]);              
              $id=$res['ember'];             
              $sql='SELECT account, money FROM accounts WHERE ember="'.$id.'"';              
              $res=R::getAll($sql);              
              $copiedRes= dataHandlerMethods::assocArrayToSimpleArray($res);                      
              return $copiedRes;              
          }
          
         
//          public static function getMeta(){
//              $sql='SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name = "moneyStatusTable"';             
//              $rs = R::getAll($sql);              
//              for ($i=0;$i<=count($rs);$i++){
//                  $j=0;
//                  //if (key($res[$i])='autentid') {echo "itt a kulcs";}
//                  foreach ($rs[$i] as $resVal){
//                      $j++;
//                      $copiedRes[$i][$j]=$resVal;
//                  }
//              }          
//              return $copiedRes;                  
//              }                    
//              
              public static function queryTester(){              
              $sql='SELECT * FROM emberek';
              $rs = R::getAll($sql);              
              $copiedRes= dataHandlerMethods::assocArrayToSimpleArray($rs);
              return $copiedRes; 
              }            
    }
    
    
    
?>
