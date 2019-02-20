<!doctype html>
<?php
session_start();
?>
<script type="text/javascript">
    function paymentValueSessionStarter(paymentItem){
        $.ajax({
          url: "valueSessionStarterAjax.php",
          type: "get",
          data: { 
           paymentItem:paymentItem           
           }           
        });
    }       
    function paymentToWrite(paymentItem){  
//        accountTypeSpanInput=accountTypeSpan+"input"; 
        document.getElementById("paymentSpan").innerHTML=paymentItem;  
        paymentValueSessionStarter(paymentItem);
    }        
</script>
<div class="col-4" style="height:150px;text-align: center;" onclick=$('#kategoriaLista').modal(); id="kategoriaAblak">                
        <div class="modal fade" id="kategoriaLista">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">                        
                       <?php
                        $resu= accounts::getPaymentStatusFromDb();
                        viewCreaterMethods::paymentTableWriter($resu);                        
                       ?>
                    </div>
                </div>
            </div>
        </div>
        <span id="paymentSpan"><?=$_SESSION["paymentItem"]?></span>
</div>
