<?php
 //File purchaseOrder_secure.php
 class purchaseOrder {
   public function placeOrder($hash, $po) {
    if(!$conn = oci_connect('xmlusr', 'xmlusr', '//localhost/XE')){
       throw new SoapFault("Server","Failed to connect to database"); 
    };
    $xmlpo = simplexml_load_string($po);       
    $pono = $xmlpo->pono;
    $pswd=sha1($pono);   
    $this->checkOrder($hash, $pswd);
    $sql = "INSERT INTO purchaseOrders VALUES(:po)";
    $query = oci_parse($conn, $sql);
    oci_bind_by_name($query, ':po', $po);
    if (!oci_execute($query)) {
        throw new SoapFault("Server","Failed to insert PO"); 
    };
    $msg='<rsltMsg>PO inserted!</rsltMsg>';
    return $msg;
   }
   private function checkOrder($hash, $pswd) {
    if ($pswd!=$hash) {
        throw new SoapFault("Server","You're not authorized to consume this service"); 
    }
   }
 }
?>
