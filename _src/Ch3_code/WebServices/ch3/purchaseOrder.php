<?php
 //File purchaseOrder.php
 class purchaseOrder {
   function placeOrder($po) {
    if(!$conn = mysql_connect('localhost', 'usr', 'pswd')){
        throw new SoapFault("Server","Failed to connect to database"); 
    };
    if(!mysql_select_db('my_db')){
        throw new SoapFault("Server","Failed to select database"); 
    };
    $sql = "INSERT INTO purchaseOrders SET doc='".$po."'";
    if (!$result = mysql_query($sql)) {
        throw new SoapFault("Server","Failed to insert PO"); 
    };
    mysql_close($conn);
    $msg='<rsltMsg>PO inserted!</rsltMsg>';
    return $msg;
   }
 }
?>
