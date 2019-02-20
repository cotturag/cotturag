<?php
session_start();

class viewCreaterMethods{
    //az egy sorban lévő adatokat egy oszlopba írja ki
    static private function inverseDirectionWriter($dataFrom){                                                
                $sizeArray=count($dataFrom[0]);// <- 0. oszlop hossza alapján rajzolja a sorokat,
                //az adatbázisban minden oszlop ugyanolyan hosszú                
                //a tömbben mindegyik oszlop ugyanolyan hosszú még ha null van bent akkor is                
                for ($j=0;$j<=$sizeArray;$j++){
                echo '<tr>';
                for ($i=0;$i<=count($dataFrom);$i++){                                        
                      echo '<th>';
                      if ($dataFrom[$i][$j]!=null) echo $dataFrom[$i][$j].' ';                        
                      echo '</th>';                    
                }
                echo '</tr>';
            }  
    }
    
    static function specialEditableTableWriter($dataFrom){
         echo 
'
<table class="table szeles szegely">
          <thead>
              <tr>
                                  
              </tr>
          </thead>
          <tbody>         
 ';
     for ($i=0;$i<=(count($dataFrom)-1);$i++){ 
         echo '<tr>';
            for ($j=0;$j<=count($dataFrom[$i]);$j++){                      
                if ($dataFrom[$i][$j]!=null){                                       
                    echo '<th>';                       
                        if ($j==1) {
                            echo '<div class="input-goup-prepend">';
                            echo '<span class="input-group-text">'.$dataFrom[$i][$j].'</span>';
                            echo '</div>';                                    
                        }
                        if ($j==2) {
                            echo '<input type="text" name="accountName" value='.$dataFrom[$i][$j].'>';
                        }
                  echo '</th>';                   
                  }
                }
             echo '</tr>';                                                      
            } 

                    
 echo
 '
          </tbody>
          
    </table>
 ';   
    }
    
    static function paymentTableWriter($dataFrom){            
        echo 
        '
        <table>
        ';
             for ($i=0;$i <=(count($dataFrom)-1);$i++){                 
                    echo '<tr>';
                    for ($j=0;$j<=count($dataFrom[$i]);$j++){                      
                        if ($dataFrom[$i][$j]!=null){                                                                                      
                          echo '<th>';                        
                            $onClick="paymentToWrite('".$dataFrom[$i][$j]."');$('#kategoriaLista').modal('hide');";
                            echo '<label onclick="'.$onClick.'">';
                                echo $dataFrom[$i][$j];
                            echo '</label>';
                          echo '</th>';                   
                          }
                        }
                     echo '</tr>';                                                      
                    }
        echo
        '
        </table>
        '; 
    }
    
    
    static function accountTableWriter($dataFrom,$accountTypeSpan,$accountValueTypeSpan,$accountList){                        
        echo 
        '
        <table>
        ';
             for ($i=0;$i <=(count($dataFrom)-1);$i++){                 
                    echo '<tr>';
                    for ($j=0;$j<=count($dataFrom[$i]);$j++){                      
                        if ($dataFrom[$i][$j]!=null){                                                                                      
                          echo '<th>';
                             $accountValue=$dataFrom[$i][2];                              
                             if ($j==1) {                                                                 
                                 $onClick="accToWrite('".$dataFrom[$i][$j]."','".$accountTypeSpan."','".$accountValueTypeSpan."','".$accountValue."');$('#".$accountList."').modal('hide');";
                             }
                             else {
                                 $onClick="";
                             }                             
                             echo "<label onclick=".$onClick.">
                            ".$dataFrom[$i][$j]."
                        </label><br />";                       
                          echo '</th>';                   
                          }
                        }
                     echo '</tr>';                                                      
                    }
        echo
        '
        </table>
        '; 
    }
        //táblát rajzol egy két dimenziós tömb adataiból
     static function TableWriter($dataFrom){            
        echo 
        '
        <table>
        ';
             for ($i=0;$i <=(count($dataFrom)-1);$i++){                 
                    echo '<tr>';
                    for ($j=0;$j<=count($dataFrom[$i]);$j++){                      
                        if ($dataFrom[$i][$j]!=null){                                                                                      
                          echo '<th>';                        
                          echo $dataFrom[$i][$j];
                          echo '</th>';                   
                          }
                        }
                     echo '</tr>';                                                      
                    }
        echo
        '
        </table>
        '; 
    }
 }
?>





