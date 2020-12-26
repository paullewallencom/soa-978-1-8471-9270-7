<?php
 //File purchaseOrder_attr_price.php
 require_once 'obj2Dom.php';
 class purchaseOrder {
   function placeOrder($po) {
//    ob_start();
//    var_dump($po);
//    $buffer = ob_get_flush();
//    file_put_contents('buffer.txt', $buffer);
//    ob_end_clean();

    $obj = new obj2Dom('purchaseOrder');
    $obj->trans2Dom($po);
    $obj->elmToAttr('id');
    $po=$obj->printDomTree();

    ob_start();
    var_dump($po);
    $buffer = ob_get_flush();
    file_put_contents('buffer.txt', $buffer);
    ob_end_clean();

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
