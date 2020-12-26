<?php 
 //File: SoapClient_orderinfo.php
 $wsdl = "http://localhost/WebServices/wsdl/po_orderinfo.wsdl";
 $client = new SoapClient($wsdl);
 $pono='108128476';
 $par = 'doc'; //can be either 'doc' or 'status'
 try {
  print $result=$client->getOrder($pono, $par);
 }
 catch (SoapFault $exp) {
  print $exp->getMessage();
 }
?>
