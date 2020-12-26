<?php
 //File reg.php
 class reg {
   function regOrder($reginfo) {
    if(!$conn = oci_connect('xmlusr', 'xmlusr', '//localhost/XE')){
        throw new SoapFault("Server","Failed to connect to database"); 
    };
    $sql="INSERT INTO regDocs VALUES(SYSDATE, :reginfo)";
    $query = oci_parse($conn, $sql);
    oci_bind_by_name($query, ':reginfo', $reginfo);
    if (!oci_execute($query)) {
        throw new SoapFault("Server","Failed to execute query"); 
    };
    $msg='Ok!';
    return $msg;
   }
 }
?>