<?php
 //File orderInfo.php
 class orderInfo {
   function getOrder($pono, $par) {
    if(!$conn = oci_connect('xmlusr', 'xmlusr', '//localhost/XE')){
        throw new SoapFault("Server","Failed to connect to database"); 
    };
    switch ($par) {
     case 'doc':
      $sql="SELECT doc FROM purchaseOrders WHERE extractValue(XMLType(doc), '/purchaseOrder/pono')=:pono AND rownum=1";
      break;
     case 'status':
      $sql="SELECT status FROM poStatusInfo WHERE pono=:pono";
      break;
    }
    $query = oci_parse($conn, $sql);
    oci_bind_by_name($query, ':pono', $pono);
    if (!oci_execute($query)) {
        throw new SoapFault("Server","Failed to execute query"); 
    };
    oci_fetch($query);
    $rslt = oci_result($query, strtoupper($par));
    return $rslt;
   }
 }
?>
