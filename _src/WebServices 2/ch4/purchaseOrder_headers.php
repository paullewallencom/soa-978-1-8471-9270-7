<?php
 //File purchaseOrder_headers.php
 class purchaseOrder {
   public function placeOrder($po) {
    if(!$conn = oci_connect('xmlusr', 'xmlusr', '//localhost/XE')){
       throw new SoapFault("Server","Failed to connect to database"); 
    };
    $sql = "INSERT INTO purchaseOrders VALUES(:po)";
    $query = oci_parse($conn, $sql);
    oci_bind_by_name($query, ':po', $po);
    if (!oci_execute($query)) {
        throw new SoapFault("Server","Failed to insert PO"); 
    };
    $msg='<rsltMsg>PO inserted!</rsltMsg>';
    return $msg;
   }
 }
?>
