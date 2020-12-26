<?php
 //File orderClass.php
 class orderClass {
   private function runQuery($sql, $pono, $par)
   {
    if(!$conn = oci_connect('xmlusr', 'xmlusr', '//localhost/XE')){
        throw new SoapFault("Server","Failed to connect to database"); 
    };
    $query = oci_parse($conn, $sql);
    oci_bind_by_name($query, ':pono', $pono);
    if (!oci_execute($query)) {
        $err=oci_error($query);
        throw new SoapFault("Server","Failed to execute query ".$err['message']); 
    }; 
    oci_fetch($query);
    $rslt = oci_result($query, $par);
    return $rslt;
   }
   public function getOrderDoc($pono) {
    $sql="SELECT doc FROM purchaseOrders WHERE extractValue(XMLType(doc), '/purchaseOrder/pono')=:pono AND rownum=1";
    return $this->runQuery($sql, $pono, 'DOC');
   }
   public function getOrderStatus($pono) {
    $sql="SELECT status FROM poStatusInfo WHERE pono=:pono";
    return $this->runQuery($sql, $pono, 'STATUS');
   }
 }
?>
