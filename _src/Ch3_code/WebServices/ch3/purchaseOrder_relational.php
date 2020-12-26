<?php
 //File purchaseOrder_relational.php
 class purchaseOrder {
   function placeOrder($po) {
    if(!$conn = new mysqli('localhost', 'usr', 'pswd', 'my_db')){
        throw new SoapFault("Server","Failed to connect to database"); 
    };
    $conn->autocommit(FALSE);
    //Into orders table you insert only upper-level PO XML doc elements containing no nested elements
    $sql="INSERT INTO orders SET ";
    foreach($po as $key => $value){
     if(!is_object($value))
     {
      $sql=$sql.$key."='".$value."',";
     }
    };
    $sql = substr($sql, 0, strlen($sql)-1);
    $stmt = $conn->prepare($sql);
    
    if (!$stmt->execute()) {
        throw new SoapFault("Server","Failed to insert PO"); 
    };
    //Then, you insert billTo and shipTo elements into appropriate tables
    foreach($po as $key => $value){
     if(is_object($value) AND $key!='items')
     {
       $sql="INSERT INTO ".$key." SET pono ='".$po->pono."',";
       foreach($value as $elmname => $elmvalue){
          $sql=$sql.$elmname."='".$elmvalue."',";
       } 
       $sql = substr($sql, 0, strlen($sql)-1);
       $stmt = $conn->prepare($sql);
       if (!$stmt->execute()) {
         throw new SoapFault("Server","Failed to insert PO"); 
       }
      }
    };
    //Finally, you fill up the items table
    foreach($po->items->item as $key => $value){
       $sql="INSERT INTO items SET pono ='".$po->pono."',";
       foreach($value as $elmname => $elmvalue){
          $sql=$sql.$elmname."='".$elmvalue."',";
       } 
       print $sql = substr($sql, 0, strlen($sql)-1);
       $stmt = $conn->prepare($sql);
       if (!$stmt->execute()) {
         throw new SoapFault("Server","Failed to insert PO"); 
       }
    }
    $conn->commit();
    $stmt->close();
    $conn->close();
    $msg='<rsltMsg>PO inserted!</rsltMsg>';
    return $msg;
   }
 }
?>
