<?php
 //File purchaseOrder_schema.php
 require_once 'obj2Dom.php';
 class purchaseOrder {
   function placeOrder($po) {
    $args['xmlns:po']='http://localhost/WebServices/schema/po/';
    $args['xmlns:xsi']='http://www.w3.org/2001/XMLSchema-instance';
    $args['xsi:schemaLocation']='http://localhost/WebServices/schema/po/ po.xsd';
    $obj = new obj2Dom('po:purchaseOrder', $args);
    $obj->trans2Dom($po);
    $po=$obj->printDomTree();
    if(!$conn = oci_connect('xmlusr', 'xmlusr', '//localhost/XE')){
       throw new SoapFault("Server","Failed to connect to database"); 
    };
    $sql = "INSERT INTO orders VALUES(XMLType(:po).createSchemaBasedXML('po.xsd'))";
    $query = oci_parse($conn, $sql);
    oci_bind_by_name($query, ':po', $po);
    if (!oci_execute($query)) {
        $err=oci_error($query);
        throw new SoapFault("Server","Failed to insert PO ".$err['message']); 
    };
    $msg='<rsltMsg>PO inserted!</rsltMsg>';
    return $msg;
   }
 }
?>
