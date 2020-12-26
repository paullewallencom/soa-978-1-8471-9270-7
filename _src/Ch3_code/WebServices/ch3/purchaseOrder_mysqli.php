<?php
 //File purchaseOrder_mysqli.php
 class purchaseOrder {
   function placeOrder($po) {
    if(!$conn = new mysqli('localhost', 'usr', 'pswd', 'my_db')){
        throw new SoapFault("Server","Failed to connect to database"); 
    };
    $sql = "INSERT INTO purchaseOrders(doc) VALUES (?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $po);
    if (!$result = $stmt->execute()) {
        throw new SoapFault("Server","Failed to insert PO"); 
    };
    $stmt->close();
    $conn->close();
    $msg='<rsltMsg>PO inserted!</rsltMsg>';
    return $msg;
   }
 }
?>
