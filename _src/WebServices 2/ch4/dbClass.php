<?php
//File dbClass.php
 class dbClass {
   public function getOrderDoc($pono) {
    $sql="SELECT doc FROM purchaseOrders WHERE extractValue(doc, '/purchaseOrder/pono')=? LIMIT 1";
    return $this->runQuery($sql, $pono);
   }
   public function getOrderStatus($pono) {
    $sql="SELECT status FROM poStatusInfo WHERE pono=?";
    return $this->runQuery($sql, $pono);
   }
   private function runQuery($sql, $pono)
   {
    if(!$conn = new mysqli('localhost', 'usr', 'pswd', 'my_db')){
        throw new SoapFault("Server","Failed to connect to database"); 
    };
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $pono);
    if (!$result = $stmt->execute()) {
        throw new SoapFault("Server","Failed to execute query"); 
    };
    $stmt->bind_result($rslt);
    $stmt->fetch();
    return $rslt;
   }
}