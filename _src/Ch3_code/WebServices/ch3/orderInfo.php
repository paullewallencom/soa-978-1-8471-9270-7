<?php
 //File orderInfo.php
 class orderInfo {
   function getOrder($pono, $par) {
    if(!$conn = oci_connect('xmlusr', 'xmlusr', '//localhost/XE')){
        throw new SoapFault("Server","Failed to connect to database"); 
    };
    foreach ($par->param as $value)
    {
      $arr[$value->key]=$value->value;
    }
    $sql="BEGIN :rslt:=".$arr['proc']."(:pono, :arg); END;";
    $query = oci_parse($conn, $sql);
    oci_bind_by_name($query, ':pono', $pono);
    oci_bind_by_name($query, ':arg', $arr['arg']);
    oci_bind_by_name($query, ':rslt', $rslt, 2000);
    if (!oci_execute($query)) {
        $err=oci_error($query);
        throw new SoapFault("Server","Failed to execute query ".$err['message']); 
    }; 
    return $rslt;
   }
 }
?>
