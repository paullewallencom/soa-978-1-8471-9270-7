<?php 
 //File: SoapClient.php
 $wsdl = "http://localhost/WebServices/wsdl/po.wsdl";
 $handle = fopen("purchaseOrder.xml", "r");
 $po= fread($handle, filesize("purchaseOrder.xml"));
 fclose($handle);
 $client = new SoapClient($wsdl);
 try {
  print $result=$client->placeOrder($po);
 }
 catch (SoapFault $exp) {
  print $exp->getMessage();
 }
?>
