<?php
session_start();
require 'rb-mysql.php';
R::setup('mysql:host=localhost;dbname=cotturag_cotturag',
        'cotturag_cotturag', 'Kiafasztudja1' );


class accounts {                    
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
                    
          public static function getMoneyStatusFromDb(){                            
              $user=$_SESSION['user'];              
              $res=R::findOne('emberek','db_username = ?',[$user]);                            
              $id=$res['ember'];              
              $sql='SELECT account, money FROM accounts WHERE ember="'.$id.'"';              
              $res=R::getAll($sql);              
              $copiedRes= accounts::assocArrayToSimpleArray($res);                      
              return $copiedRes;              
          }
           public static function getPaymentStatusFromDb(){                            
              $user=$_SESSION['user'];              
              $res=R::findOne('emberek','db_username = ?',[$user]);                            
              $id=$res['ember'];              
              $sql='SELECT payment FROM payments WHERE ember="'.$id.'"';              
              $res=R::getAll($sql);              
              $copiedRes= accounts::assocArrayToSimpleArray($res);                      
              return $copiedRes;              
          }
          
              public static function queryTester(){              
              $sql='SELECT * FROM emberek';
              $rs = R::getAll($sql);              
              $copiedRes= accounts::assocArrayToSimpleArray($rs);
              return $copiedRes; 
              }      
    
}
