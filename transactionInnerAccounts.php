<!doctype html>
<?php
session_start();
?>
<style type="text/css">
    #szamlaAblak1 {
       
    }
    #szamlaAblak3 {
       
    }    
</style>
<script type="text/javascript">
    function accountValueSessionStarter(accountItem1,accountItem3,accountValue1,accountValue3){
        $.ajax({
          url: "valueSessionStarterAjax.php",
          type: "get",
          data: { 
           accountItem1:accountItem1,
           accountItem3:accountItem3,
           accountValue1:accountValue1,
           accountValue3:accountValue3               
           }           
        });
    }       
    function accToWrite(accountItem,accountTypeSpan,accountValueTypeSpan,accountValue){  
        accountTypeSpanInput=accountTypeSpan+"input";        
        accountValueTypeSpanInput=accountValueTypeSpan+"input";
        document.getElementById(accountTypeSpan).innerHTML=accountItem;       
        document.getElementById(accountTypeSpanInput).value=accountItem;        
        
        document.getElementById(accountValueTypeSpan).innerHTML=accountValue;
        document.getElementById(accountValueTypeSpanInput).value=accountValue;             
        
        switch (accountTypeSpan){
            case "accountTypeSpan1":                    
                   var accountItem1=accountItem;
                   var accountValue1=accountValue;
                    break;     
            case "accountTypeSpan3":
                    var accountItem3=accountItem;
                    var accountValue3=accountValue;
                    break;            
        }        
        accountValueSessionStarter(accountItem1,accountItem3,accountValue1,accountValue3);
    }   
</script>
<?php 
$accountDivId="szamlaAblak".$posAccounts;
$accountList="accountList".$posAccounts;
$accountTypeSpan="accountTypeSpan".$posAccounts;
$accountValueTypeSpan=$accountTypeSpan."value";
?>

<div class="col-4" style="height:150px; text-align: center;" onclick=$('#<?=$accountList?>').modal(); id="<?=$accountDivId?>">                
        <div class="modal fade" id="<?=$accountList?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">                        
                        <?php                                              
                        $resu= accounts::getMoneyStatusFromDb();
                        viewCreaterMethods::accountTableWriter($resu,$accountTypeSpan,$accountValueTypeSpan,$accountList);                           
                        ?>
                    </div>
                </div>
            </div>
        </div>
        
        <span id="<?=$accountTypeSpan?>">
            <?php 
            switch ($accountTypeSpan){
                case "accountTypeSpan1":
                    echo $_SESSION["accountItem1"];
                    break;
                case "accountTypeSpan3":
                    echo $_SESSION["accountItem3"];
                    break;               
            }            
            ?>
        </span><br />        
        
        <?php $accountTypeSpanInput=$accountTypeSpan."input";?>
        <input type='hidden' id="<?=$accountTypeSpanInput?>">
        
        <span id="<?=$accountValueTypeSpan?>">
            <?php
            switch ($accountTypeSpan){
            case "accountTypeSpan1":
                echo $_SESSION["accountValue1"];
                break;
            case "accountTypeSpan3":
                echo $_SESSION["accountValue3"];
                break;            
            }            
            ?>
        </span><br />        
        
        
        <?php $accountValueTypeSpanInput=$accountValueTypeSpan."input";?>
        <input type='hidden' id="<?=$accountValueTypeSpanInput?>">
                
        
</div>


