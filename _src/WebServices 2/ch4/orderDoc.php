<?php
 //File orderDoc.php
 class orderDoc {
   function getOrderDoc($pono) {
    if(!$conn = oci_connect('xmlusr', 'xmlusr', '//localhost/XE')){
        throw new SoapFault("Server","Failed to connect to database"); 
    };
    $sql="SELECT doc FROM purchaseOrders WHERE extractValue(XMLType(doc), '/purchaseOrder/pono')=:pono AND rownum=1";
    $query = oci_parse($conn, $sql);
    oci_bind_by_name($query, ':pono', $pono);
    if (!oci_execute($query)) {
        $err=oci_error($query);
        throw new SoapFault("Server","Failed to execute query ".$err['message']); 
    }; 
    oci_fetch($query);
    $rslt = oci_result($query, 'DOC');
    return $rslt;
   }
 }
?>
