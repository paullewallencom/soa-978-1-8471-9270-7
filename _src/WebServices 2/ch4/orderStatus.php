<?php
 //File orderStatus.php
 class orderStatus {
   function getOrderStatus($pono) {
    if(!$conn = oci_connect('xmlusr', 'xmlusr', '//localhost/XE')){
        throw new SoapFault("Server","Failed to connect to database"); 
    };
    $sql="SELECT status FROM poStatusInfo WHERE pono=:pono";
    $query = oci_parse($conn, $sql);
    oci_bind_by_name($query, ':pono', $pono);
    if (!oci_execute($query)) {
        $err=oci_error($query);
        throw new SoapFault("Server","Failed to execute query ".$err['message']); 
    }; 
    oci_fetch($query);
    $rslt = oci_result($query, 'STATUS');
    return $rslt;
   }
 }
?>
