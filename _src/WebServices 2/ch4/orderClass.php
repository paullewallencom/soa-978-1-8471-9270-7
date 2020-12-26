<?php
 //File _orderClass.php
 require_once "dbClass.php"; 
 class orderClass {
   public function getOrderDoc($pono) {
    $dbObj = new dbClass();
    return $dbObj->getOrderDoc($pono);
   }
   public function getOrderStatus($pono) {
    $dbObj = new dbClass();
    return $dbObj->getOrderStatus($pono);
   }
 }
?>
